<?php

namespace App\Http\Controllers;

use App\Contants\Message;
use App\Notifications\DepositApprovalNotification;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('getAllDeposits');
    }

    public function index()
    {
        return view('transaction.index');
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
        $transaction->transaction_id = request()->transaction_id;
        $transaction->wallet_address = request()->wallet_address;
        if (!$transaction->save()) {
            return redirect(route('deposit'))->with(['error' => 'Could not update transaction wallet']);
        }
        return redirect(route('deposit'))->with(['success' => Message::TRX_SAVED]);
    }

    public function getAllDeposits()
    {
        $deposits = Transaction::where(['transaction_type' => Transaction::DEPOSIT])
            ->orderBy('created_at', 'DESC')->get();
        return view('admin.deposit', compact('deposits'));
    }

    public function showDeposits()
    {
        $deposits = Transaction::where(['transaction_type' => Transaction::DEPOSIT])
            ->orderBy('created_at', 'DESC')->get();
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
}
