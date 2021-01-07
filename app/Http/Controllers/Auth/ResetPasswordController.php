<?php

namespace App\Http\Controllers\Auth;

use App\Contants\Message;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
    }

    public function showResetForm(Request $request, $token = null)
    {
        $loginRoute = route('login');
        $pwdUpdate = route('password.update');
        return view('auth.passwords.reset')->with([
            'token' => $token, 'email' => $request->email,
            'loginRoute' => $loginRoute, 'pwdUpdate' => $pwdUpdate
        ]);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request)
    {
        return redirect($this->redirectTo)
            ->with('success', Message::RESET_PWD_SUCCESS);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->with(['error' => Message::EXPIRED_RESET_TOKEN]);
    }
}
