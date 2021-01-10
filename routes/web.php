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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/deposits', 'TransactionController@getAllDeposits')
        ->name('admin.deposit')->middleware('auth:admin');
    Route::post('/approve-deposit', 'TransactionController@approveDeposit')
        ->name('admin.approve-deposit')->middleware('auth:admin');
    Route::get('/view-deposits', 'TransactionController@viewDeposit')
        ->name('admin.view-deposit')->middleware('auth:admin');
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