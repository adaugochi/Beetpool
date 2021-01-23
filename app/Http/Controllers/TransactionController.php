<?php

namespace App\Http\Controllers;

use App\Contants\Message;
use App\Helper\Utils;
use App\InvestmentPlan;
use App\Notifications\InvestmentNotification;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Exception;

class TransactionController extends Controller
{
    public $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction;
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $transactions = $this->transaction->where(['user_id' => auth()->user()->id])->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);

        try {
            $id = $this->transaction->createDeposit($request->all());
            return redirect(route('wallet-address', $id))
                ->with(['success' => 'Deposit saved successfully']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function showWallet($id)
    {
        $deposit = $this->transaction->findOrFail($id);
        return view('transaction.wallet-address', compact('id', 'deposit'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function updateDeposit(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'wallet_address' => 'required',
        ]);

        $transaction = $this->transaction->find(request()->id);
        if (!$transaction) {
            return redirect(route('deposit'))->with(['error' => 'Could not find this transaction']);
        }
        try {
            $transaction->transaction_id = request()->transaction_id;
            $transaction->wallet_address = request()->wallet_address;
            if (!$transaction->save()) {
                throw new Exception('Could not update transaction wallet');
            }
            return redirect()->route('deposit')->with(['success' => Message::TRX_SAVED]);
        } catch (Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function showDeposits()
    {
        $deposits = $this->transaction->where([
            'transaction_type_id' => Transaction::DEPOSIT,
            'user_id' => auth()->user()->id
        ])->orderBy('id', 'DESC')->get();
        return view('transaction.deposit', compact('deposits'));
    }
    
    public function getAllInvestments()
    {
        $investments = $this->transaction->where(['user_id' => auth()->user()->id])
            ->whereIn('transaction_type_id', [Transaction::INVESTMENT, Transaction::TOP_UP])
            ->orderBy('id', 'DESC')->get();
        return view('transaction.investment', compact('investments'));
    }

    public function getAllInvestmentPlans()
    {
        $userId = auth()->user()->id;
        $wallet_balance = $this->transaction->getBalance($userId);
        $plans = InvestmentPlan::all();
        return view('transaction.investment-plan', compact('wallet_balance', 'plans'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function saveInvestment(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'key' => 'required',
        ]);
        $package = InvestmentPlan::where('key',  request()->key)->firstOrFail();

        try {
            $package->checkInvestmentAmount((float)request()->wallet_balance);
            $amount = $package->amount;

            DB::table('transactions')
                ->insert([
                    'user_id' => auth()->user()->id,
                    'amount' => $amount,
                    'maturity_date' => Utils::getDateAfterCertainDays(),
                    'maturity_status' => Transaction::PENDING,
                    'status' => Transaction::ACTIVE,
                    'transaction_type_id' => Transaction::INVESTMENT,
                    'investment_plan_id' => $package->id,
                    'expected_return' => Utils::getReturns($package->roi, $amount),
                    'created_at' => date('Y-m-d H:i:s'),
                    'withdrawal_date' => Utils::getDateAfterCertainDays("+30 day")
                ]);
            Notification::send(auth()->user(), new InvestmentNotification($amount));
            DB::commit();
            return redirect()->back()->with(['success' => 'Investment was successful']);
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => $ex->getMessage() ?? 'Could not initiate this investment'
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function getAllWithdrawals()
    {
        $withdrawal_balance = $this->transaction->getBalance(auth()->user()->id, true);
        return view('transaction.withdrawal', compact('withdrawal_balance'));
    }

    public function saveWithdrawal()
    {

    }
}
