<?php

namespace App;

use App\Helper\Utils;
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
 * @property string status
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

    protected $fillable = [
        'user_id', 'transaction_type_id', 'investment_plan_id', 'transaction_id',
        'amount', 'currency', 'wallet_address', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(InvestmentPlan::class, 'investment_plan_id');
    }

    public function trxType()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
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

    public function getActiveInvestments($user_id)
    {
        $investment = 0.00;
        $transactions = $this->where([
            'user_id' => $user_id,
            'status' => self::ACTIVE,
            'transaction_type_id' => self::INVESTMENT
        ])->get();
        foreach ($transactions as $trx) {
            $investment += (float)$trx->amount;
        }
        return $investment;
    }

    public function getInvestmentEarnings($user_id)
    {
        $investment = 0.00;
        $transactions = $this->where([
            'user_id' => $user_id,
            'status' => self::CLOSED,
            'transaction_type_id' => self::INVESTMENT
        ])->get();
        foreach ($transactions as $trx) {
            $investment += (float)$trx->expected_return - (float)$trx->amount;
        }
        return $investment;
    }

    public function getWithdrawalsEarnings($user_id)
    {
        $withdraw = 0.00;
        $transactions = $this->where([
            'user_id' => $user_id,
            'status' => self::APPROVED,
            'transaction_type_id' => self::WITHDRAW
        ])->get();
        foreach ($transactions as $trx) {
            $withdraw += (float)$trx->amount;
        }
        return $withdraw;
    }

    public function isPending()
    {
        return $this->status == self::PENDING;
    }

    public function isApproved()
    {
        return $this->status == self::APPROVED;
    }

    /**
     * @param $user_id
     * @param bool $withdraw
     * @return float
     * @throws Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function getBalance($user_id, $withdraw = false)
    {
        $balance = 0.00;
        $deposit = 0.00;
        $topup = 0.0;
        $withdrawal = 0.00;
        $investment = 0.00;

        $transactions = $this->where(['user_id' => $user_id])->get();
        if( sizeof($transactions) > 0 ) {
            foreach ($transactions as $trx) {
                if($trx->transaction_type_id == self::DEPOSIT && $trx->isApproved()) {
                    $deposit += (float) $trx->amount;
                }
                if($trx->transaction_type_id == self::INVESTMENT) {
                    $investment += (float) $trx->package->amount;
                }
                if ($trx->transaction_type_id == self::TOP_UP) {
                    if(!$withdraw) {
                        $topup += (float)$trx->expected_return;
                    } else {
                        if (Utils::getDaysLeft($trx->withdrawal_date) == 0) {
                            $topup += (float)$trx->expected_return;
                        }
                    }
                }

                if($trx->transaction_type_id == self::WITHDRAW && $trx->isApproved()) {
                    $withdrawal += (float) $trx->amount;
                }
            }
            $balance = (float) ($deposit + $topup - $investment - $withdrawal);
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
