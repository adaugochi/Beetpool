<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : $this->emailVerify($request->user()->id);
    }

    public function emailVerify($userId)
    {
        return view('auth.verify', compact('userId'));
    }

    /**
     * Resend the email verification notification.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return back()->with('error', 'Could not find this user');
        }
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $user->sendEmailVerificationNotification();
        return back()->with('success', 'A fresh verification link has been sent to your email address.');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function verify(Request $request)
    {
        $user = User::findOrFail(request('id'));
        $user->email_verified_at = date("Y-m-d g:i:s");
        $user->is_active = 1;
        $user->save();
        return redirect(route('login'))
            ->with('success', 'Your email address has been successfully verified. You can now login.');
    }
}
