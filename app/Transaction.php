<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property string transaction_type_id
 * @property mixed amount
 * @property string currency
 * @property mixed created_at
 * @property mixed id
 * @property mixed to_address
 */
class Transaction extends Model
{
    const DEPOSIT = 1;
    const PURCHASE = 6;
    const TRADING_BONUS = 5;
    const INVESTMENT = 2;
    const TOP_UP = 3;
    const WITHDRAW = 4;

    const APPROVED = 'approved';
    const PENDING = 'pending';
    const ACTIVE = 'active';
    const MATURED = 'matured';
    const CLOSED = 'closed';

    public static $ROI = [
        10 => '10%',
        20 => '20%'
    ];

    protected $fillable = [
        'user_id',
        'transaction_type_id',
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
        $this->transaction_type_id = self::DEPOSIT;
        $this->amount = $postData['amount'];
        if (!$this->save()) {
            throw new Exception('Could not make a deposit');
        }
        return $this->id;
    }

    public function getTotalTransactions($user_id)
    {
        return $this->where(['user_id' => $user_id])->count();
    }

    public function getTotalInvestments($user_id)
    {
        return $this->where('user_id', '=', $user_id)
            ->whereIn('transaction_type_id', [self::INVESTMENT, self::TOP_UP])->count();
    }

    public function getInvestmentEarnings()
    {

    }

    public function getWithdrawalsEarnings()
    {

    }

    public function getReferralEarnings()
    {

    }

    public function getBalance($user_id)
    {
        $balance = 0.00;
        $deposit = 0.00;
        $topup = 0.0;
        $withdraw = 0.00;

        $transactions = $this->where(['user_id' => $user_id])->get();
        if( sizeof($transactions) > 0 ) {
            foreach ($transactions as $trx) {
                if( $trx->transaction_type_id == self::DEPOSIT) {
                    $deposit += (float) $trx->amount;
                }

                if( $trx->transaction_type_id == self::TOP_UP) {
                    $topup += (float) $trx->expected_return;
                }
            }
            $balance = (float) ($deposit + $withdraw + $topup);
        }

        return $balance;
    }

    /**
     * @return false|string
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function formatDate()
    {
        return date("M d, Y h:i A", strtotime($this->created_at));
    }
}
