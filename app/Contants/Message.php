<?php

namespace App\Contants;

class Message
{
    const SIGNUP_SUCCESSFUL = 'Registration was successfully! Please check your email to verify your account';
    const LOGIN_INCORRECT = 'You entered an incorrect login credentials';
    const USER_DOES_NOT_EXIST = 'This email address does not exist';
    const RESET_PWD_TOKEN = 'Your password reset token has expired. Please go to forget password to request for new token';
    const RESET_PWD_SUCCESS = 'Password reset was successfully. You can now login...!';
    const PASSWORD_RESET = 'We have send a password reset link to your email';
    const WITHDRAWAL_REQUEST = 'Withdrawal request was sent successfully. Our team will review your request and take appropriate action';
    const WITHDRAW_FAIL = 'The amount available for withdrawal is less than the amount you are requesting for';
    const EXPIRED_RESET_TOKEN = 'Your password reset token has expired. Please go to forget password to request for new token';
    const TRX_SAVED = 'Transaction saved successfully. Once your transaction is confirm, your transaction status will be update';
    const ERROR_MESSAGE_INVEST = "The balance on your wallet is not enough for this investment plan. Kindly proceed to make a deposit in your wallet";
    const ACCOUNT_VERIFICATION = "Your account is not yet verified. We have emailed you a link to verified your email address.";
}