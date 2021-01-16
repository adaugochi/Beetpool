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

    public static function getDateAfter7Days()
    {
        $date = strtotime("+7 day", time());
        return date('Y-m-d: H:i:s', $date);
    }

    public static function getReturns($roi, $amount)
    {
        return ($roi/100 * (float)$amount) + (float)$amount;
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
     * @return int
     * @throws \Exception
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public static function getDaysLeft($maturityDate)
    {
        $first_date = new DateTime(date('Y-m-d'));
        $second_date = new DateTime(self::getDate($maturityDate));
        $interval = $first_date->diff($second_date);
        return $interval->invert == 0 ? $interval->d : 0;
    }
}