<?php

namespace App\Helper;

use DateTime;

class Utils
{
    public static function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

    public static function getDateAfterCertainDays($days = "+7 day")
    {
        $date = strtotime($days, time());
        return date('Y-m-d H:i:s', $date);
    }

    public static function getReturns($roi, $amount)
    {
        $dailyProfit = $roi/100 * (float)$amount;
        $totalProfitFor7Days = $dailyProfit * 7;
        return $totalProfitFor7Days + (float)$amount;
    }

    public static function formatDate($date)
    {
        return date("M d, Y h:i A", strtotime($date));
    }

    /**
     * @param $date
     * @return string
     * @throws \Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public static function getDate($date)
    {
        $datetime = new DateTime($date);
        return $datetime->format('Y-m-d');
    }

    /**
     * @param $maturityDate
     * @param $createdDate
     * @return int
     * @throws \Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public static function getDaysLeft($maturityDate, $createdDate)
    {
        $first_date = new DateTime(self::getDate($createdDate));
        $second_date = new DateTime(self::getDate($maturityDate));
        $interval = $first_date->diff($second_date);
        return $interval->invert == 0 ? $interval->days : 0;
    }
}