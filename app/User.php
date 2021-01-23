<?php

namespace App;

use App\Notifications\UserResetPasswordNotification;
use App\Notifications\UserVerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed is_active
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'full_name', 'email', 'username', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserVerifyEmailNotification());
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function isActive()
    {
        return $this->is_active == self::ACTIVE;
    }

}
