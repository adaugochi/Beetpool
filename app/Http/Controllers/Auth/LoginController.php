<?php

namespace App\Http\Controllers\Auth;

use App\Contants\Message;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function showLoginForm()
    {
        $loginRoute = route('login');
        $forgotPwdRoute = route('password.request');
        return view('auth.login', compact('loginRoute', 'forgotPwdRoute'));
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            if($user->email_verified_at !== NULL) {
                return redirect(route('home'));
            }
            $user->sendEmailVerificationNotification();
        }
        return $this->sendFailedLoginResponse();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    protected function sendFailedLoginResponse()
    {
        return redirect()->back()->with(['error' => Message::LOGIN_INCORRECT]);
    }

    /**
     * Get the needed authorization credentials from the request.
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }

    /**
     * Log the user out of the application.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
