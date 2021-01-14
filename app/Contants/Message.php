<?php

namespace App\Contants;

class Message
{
    const SIGNUP_SUCCESSFUL = 'Registration was successfully! Please check your email to verify your account';
    const LOGIN_INCORRECT = 'You entered an incorrect login credentials';
    const USER_DOES_NOT_EXIST = 'This email address does not exist';
    const RESET_PWD_TOKEN = 'Your password reset token has expired. Please go to forget password to
    request for new token';
    const RESET_PWD_SUCCESS = 'Password reset was successfully. You can now login...!';
    const PASSWORD_RESET = 'We have send a password reset link to your email';
    const EXPIRED_RESET_TOKEN = 'Your password reset token has expired. Please go to forget password to 
    request for new token';
    const TRX_SAVED = 'Transaction saved successfully. Ones your transaction if confirm, your transaction
    status will be update';
    const ACCOUNT_VERIFICATION = "Your account is not yet verified. We have emailed you a link to verified your email address.";
}