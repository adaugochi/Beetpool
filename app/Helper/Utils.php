<?php

namespace App\Helper;

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
}