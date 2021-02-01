<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    private $transaction;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->transaction = new Transaction;
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function index()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.user', compact('users'));
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function showUserTransactions($userId)
    {
        $user = User::firstOrFail($userId);
        $wallet_balance = $this->transaction->getBalance($userId);
        $withdrawal_balance = $this->transaction->getBalance($userId, true);
        return view('admin.user-transactions', compact('user', 'withdrawal_balance', 'wallet_balance'));
    }
}
