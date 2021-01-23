<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int referral_user_id
 * @property int user_id
 */
class Referral extends Model
{
    protected $fillable = ['referral_user_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function referral()
    {
        return $this->belongsTo(User::class, 'referral_user_id');
    }

    public function getTotalReferrals($user_id)
    {
        $count = 0;
        $users = $this->where('referral_user_id', $user_id)->get();
        foreach ($users as $user) {
            if ($user->user->hasVerifiedEmail()) {
                $count += 1;
            }
        }
        return $count;
    }

    public function getReferralEarnings()
    {

    }
}
