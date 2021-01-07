<?php

namespace App\Contants;

class Message
{
    const SIGNUP_SUCCESSFUL = 'Registration was successfully! Please check your email to verify your account';
    const LOGIN_INCORRECT = 'You entered an incorrect login credentials';
    const RESET_PWD_TOKEN = 'Your password reset token has expired. Please go to forget password to
    request for new token';
    const RESET_PWD_SUCCESS = 'Password reset was successfully. You can now login...!';
    const PASSWORD_RESET = 'We have send a password reset link to your email';
    const EXPIRED_RESET_TOKEN = 'Your password reset token has expired. Please go to forget password to request for new token';
}