<?php

namespace App\Http\Controllers;

use App\Referral;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $transaction;
    private $referral;

    public function __construct()
    {
        $this->transaction = new Transaction;
        $this->referral = new Referral();
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $totalTransaction = $this->transaction->getTotalTransactions($userId);
        $totalInvestment = $this->transaction->getTotalInvestments($userId);
        $activeInvestments = $this->transaction->getActiveInvestments($userId);
        $investmentEarnings = $this->transaction->getInvestmentEarnings($userId);
//        $totalWithdrawals = $this->transaction->getWithdrawalsEarnings($userId);
        $wallet_balance = $this->transaction->getBalance($userId);
        $withdrawal_balance = $this->transaction->getBalance($userId, true);
        $totalNoReferrals = $this->referral->getTotalReferrals($userId);

        return view('home', compact(
            'wallet_balance', 'totalTransaction', 'totalInvestment', 'activeInvestments',
            'totalNoReferrals', 'investmentEarnings', 'withdrawal_balance'
        ));
    }
}
