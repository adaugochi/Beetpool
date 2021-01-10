<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction;
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $wallet_balance = $this->transaction->getBalance($userId);
        return view('home', compact('wallet_balance'));
    }
}
