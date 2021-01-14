<?php

namespace App\Http\Controllers;

use App\Contants\Message;
use App\Helper\Utils;
use App\Notifications\DepositApprovalNotification;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use PHPUnit\Util\Exception;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('getAllDeposits');
    }

    public function index()
    {
        $transactions = Transaction::where(['user_id' => auth()->user()->id])->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * @param Request $request
     * @param Transaction $transaction
     * @return \Illuminate\Http\RedirectResponse
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createDeposit(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required',
        ]);

        try {
            $id = $transaction->createDeposit($request->all());
            return redirect(route('wallet-address', $id))
                ->with(['success' => 'Deposit saved successfully']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    public function showWallet($id)
    {
        $deposit = Transaction::findOrFail($id);
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

        $transaction = Transaction::find(request()->id);
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

    public function getAllDeposits()
    {
        $deposits = Transaction::where(['transaction_type' => Transaction::DEPOSIT])
            ->orderBy('id', 'DESC')->get();
        return view('admin.deposit', compact('deposits'));
    }

    public function showDeposits()
    {
        $deposits = Transaction::where([
            'transaction_type' => Transaction::DEPOSIT,
            'user_id' => auth()->user()->id
        ])->orderBy('id', 'DESC')->get();
        return view('transaction.deposit', compact('deposits'));
    }

    public function approveDeposit(Request $request)
    {
        $deposit = Transaction::where('id', $request->id)->first();
        $deposit->status = Transaction::APPROVED;
        Notification::send($deposit->user, new DepositApprovalNotification());
        if ($deposit->save()){
            return redirect()->back()->with(['success' => 'Transaction approved successfully']);
        }
        return redirect()->back()->with(['error' => 'failed transaction']);
    }

    public function showDeposit($id)
    {
        $deposit = Transaction::findOrFail($id);
        return view('admin.view-deposit', compact('deposit'));
    }

    public function invest(Request $request)
    {
        $request->validate([
            'roi' => 'required',
        ]);
        $transaction = Transaction::find(request()->id);
        if (!$transaction) {
            return redirect()->back()->with(['error' => 'Could not find this transaction']);
        }

        try {
            $roi = request()->roi;
            $transaction->roi = $roi;
            $transaction->maturity_date = Utils::getDateAfter7Days();
            $transaction->maturity_status = Transaction::PENDING;
            $transaction->status = Transaction::ACTIVE;
            $transaction->transaction_type = Transaction::INVESTMENT;
            $transaction->expected_return = Utils::getReturns($roi, request()->amount);
            if (!$transaction->save()) {
                throw new Exception('Could not initiate this investment');
            }
            return redirect()->back()->with(['success' => 'Investment was successful']);
        } catch (Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
