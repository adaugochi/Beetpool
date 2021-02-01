<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
Route::get('email/verify/{id}', 'Auth\VerificationController@emailVerify')->name('auth.email.verify');
Route::get('/register', function () {
    $referral = request()->ref;
    return view('auth.register', compact('referral'));
})->name('register');

Route::prefix('admin')->group( function () {
    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/sign-in', 'Auth\AdminLoginController@signIn')->name('admin.sign-in');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')
        ->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')
        ->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')
        ->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')
        ->name('admin.password.reset');

    // Portal routes
    Route::get('/home', 'AdminHomeController@index')->name('admin.home');
    Route::get('/transactions', 'AdminTransactionController@index')
        ->name('admin.transactions');
    Route::get('/deposits', 'AdminTransactionController@getAllDeposits')
        ->name('admin.deposits');
    Route::post('/approve-deposit', 'AdminTransactionController@approveDepositWithdrawal')
        ->name('admin.approve-deposit');
    Route::get('/transactions/{id}', 'AdminTransactionController@show')
        ->name('admin.transaction');
    Route::get('/investments', 'AdminTransactionController@getAllInvestments')
        ->name('admin.investments');
    Route::get('/investment-plan', 'InvestmentPlanController@index')
        ->name('admin.investment-plan');
    Route::post('/save-investment-plan', 'InvestmentPlanController@create')
        ->name('admin.save-investment-plan');
    Route::post('/close-investment', 'AdminTransactionController@closeInvestment')
        ->name('admin.close-investment');
    Route::get('/withdrawal-requests', 'AdminTransactionController@getAllWithdrawalRequests')
        ->name('admin.withdrawals');
    Route::post('/approve-withdrawal', 'AdminTransactionController@approveDepositWithdrawal')
        ->name('admin.approve-withdrawal');
    Route::get('/users', 'AdminHomeController@users')->name('admin.users');
    Route::get('/users/{id}/transaction', 'AdminHomeController@showUserTransactions')
        ->name('admin.user-transactions');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/transactions', 'TransactionController@index')->name('transaction');
Route::get('/deposits', 'TransactionController@showDeposits')->name('deposit');
Route::post('/create-deposit', 'TransactionController@createDeposit')
    ->name('create-deposit');
Route::post('/update-deposit', 'TransactionController@updateDeposit')
    ->name('update-deposit');
Route::get('/deposit/qr-code/{id}', 'TransactionController@showWallet')
    ->name('wallet-address');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/save-profile', 'ProfileController@saveProfile')->name('save-profile');
Route::get('/investments', 'TransactionController@getAllInvestments')->name('investment');
Route::get('/investment-plans', 'TransactionController@getAllInvestmentPlans')->name('investment-plan');
Route::get('/withdrawals', 'TransactionController@getAllWithdrawals')->name('withdrawal');
Route::post('/save-withdrawal', 'TransactionController@saveWithdrawal')->name('save-withdrawal');
Route::post('/update-withdrawal', 'TransactionController@updateWithdrawal')->name('update-withdrawal');
Route::post('/invest', 'TransactionController@saveInvestment')->name('invest');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});