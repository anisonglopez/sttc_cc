<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobmateriallist extends Model
{
    protected $fillable = [
        'job_id', 'qty_out','qty_in', 'stock_balance_as', 'm_id', 'reason'
    ];
}
