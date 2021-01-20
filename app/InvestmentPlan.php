<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    protected $fillable = ['name'. 'key', 'amount', 'roi'];
}
