<?php

namespace App;

use App\Contants\Message;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed key
 * @property mixed amount
 */
class InvestmentPlan extends Model
{
    protected $fillable = ['name'. 'key', 'amount', 'roi'];

    /**
     * @param $walletBalance
     * @return bool
     * @throws Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function checkInvestmentAmount($walletBalance)
    {
        switch ($this->key) {
            case "starter":
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
                break;
            case "golden":
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
                break;
            case "premium":
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
                break;
            case "deluxe":
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
                break;
            case "exclusive":
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
                break;
            default:
                if ($walletBalance < $this->amount) {
                    throw new Exception(Message::ERROR_MESSAGE_INVEST);
                }
        }

        return true;
    }
}
