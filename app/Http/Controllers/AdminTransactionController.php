<?php

namespace App\Http\Controllers;

use App\Helper\Utils;
use App\Notifications\CloseInvestmentNotification;
use App\Notifications\DepositApprovalNotification;
use App\Notifications\InvestmentNotification;
use App\Notifications\WithdrawalRequestNotification;
use App\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AdminTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        return view('admin.transaction', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.view-transaction', compact('transaction'));
    }

    public function getAllDeposits()
    {
        $deposits = Transaction::where(['transaction_type_id' => Transaction::DEPOSIT])
            ->orderBy('id', 'DESC')->get();
        return view('admin.deposit', compact('deposits'));
    }

    public function approveDepositWithdrawal(Request $request)
    {
        $transaction = Transaction::where('id', $request->id)->first();
        if (!$transaction) {
            return redirect()->back()->with(['error' => 'Could not find this transaction']);
        }

        $transaction->status = Transaction::APPROVED;
        if ($transaction->transaction_type_id == Transaction::DEPOSIT) {
            Notification::send($transaction->user, new DepositApprovalNotification());
        } else {
            Notification::send($transaction->user, new WithdrawalRequestNotification());
        }
        if ($transaction->save()){
            return redirect()->back()->with(['success' => 'Transaction approved successfully']);
        }
        return redirect()->back()->with(['error' => 'failed transaction']);
    }

    public function invest(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'roi' => 'required',
        ]);
        $transaction = Transaction::find(request()->id);
        if (!$transaction) {
            return redirect()->back()->with(['error' => 'Could not find this transaction']);
        }

        try {
            $roi = request()->roi;
            $amount = request()->amount;

            DB::table('transactions')->where('id', request('id'))->limit(1)
                ->update([
                    'roi' => $roi,
                    'maturity_date' => Utils::getDateAfter7Days(),
                    'maturity_status' => Transaction::PENDING,
                    'status' => Transaction::ACTIVE,
                    'transaction_type_id' => Transaction::INVESTMENT,
                    'expected_return' => Utils::getReturns($roi, $amount),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            Notification::send($transaction->user, new InvestmentNotification($amount));
            DB::commit();
            return redirect()->back()->with(['success' => 'Investment was successful']);
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Could not initiate this investment']);
        }
    }

    public function getAllInvestments()
    {
        $investments = Transaction::whereIn(
            'transaction_type_id', [Transaction::INVESTMENT, Transaction::TOP_UP]
        )->orderBy('id', 'DESC')->get();
        return view('admin.investment', compact('investments'));
    }

    public function closeInvestment()
    {
        DB::beginTransaction();
        $id = request()->id;
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return redirect()->back()->with(['error' => 'Could not find this transaction']);
        }

        try {
            DB::table('transactions')->where('id', $id)->limit(1)
                ->update([
                    'maturity_status' => Transaction::MATURED,
                    'status' => Transaction::CLOSED,
                    'transaction_type_id' => Transaction::TOP_UP
                ]);
            Notification::send($transaction->user, new CloseInvestmentNotification($transaction->amount));
            DB::commit();
            return redirect()->back()->with(['success' => 'Investment was close successful']);
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Could not close this investment']);
        }
    }

    public function getAllWithdrawalRequests()
    {
        $withdrawals = Transaction::where(['transaction_type_id' => Transaction::WITHDRAW])->get();
        return view('admin.withdrawal', compact('withdrawals'));
    }
}
