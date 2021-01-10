<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public static function getAllCountries()
    {
        return self::all();
    }
}
