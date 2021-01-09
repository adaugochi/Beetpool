<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property string transaction_type
 * @property mixed amount
 * @property string currency
 * @property mixed created_at
 * @property mixed id
 * @property mixed to_address
 */
class Transaction extends Model
{
    const DEPOSIT = 'deposit';
    const TRANSFER = 'transfer'; // Tran
    const PURCHASE = 'purchase';
    const TRADING_BONUS = 'trading-bonus';
    const INTEREST = 'interest';

    const APPROVED = 'approved';
    const PENDING = 'pending';

    protected $fillable = [
        'user_id',
        'transaction_type',
        'transaction_id',
        'amount',
        'currency',
        'wallet_address',
        'status',
        'investment_package'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $postData
     * @return mixed
     * @throws Exception
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createDeposit($postData)
    {
        $this->user_id = auth()->user()->id;
        $this->transaction_type = self::DEPOSIT;
        $this->amount = $postData['amount'];
        if (!$this->save()) {
            throw new Exception('Could not make a deposit');
        }
        return $this->id;
    }
}
