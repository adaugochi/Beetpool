<?php

namespace App\Http\Controllers;

use App\Contants\Message;
use App\InvestmentPlan;
use App\Transaction;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

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
     * @param Transaction $transaction
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
        $investments = $this->transaction->where([
            'transaction_type_id' => Transaction::INVESTMENT,
            'user_id' => auth()->user()->id
        ])->orderBy('id', 'DESC')->get();
        return view('transaction.investment', compact('investments'));
    }

    public function getAllInvestmentPlans()
    {
        $userId = auth()->user()->id;
        $wallet_balance = $this->transaction->getBalance($userId);
        $plans = InvestmentPlan::all();
        return view('transaction.investment-plan', compact('wallet_balance', 'plans'));
    }
}
