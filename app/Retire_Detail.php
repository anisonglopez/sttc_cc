<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retire_Detail extends Model
{
    protected $fillable = [
        'retire_id', 'm_id', 'qty_out', 'qty_balance_as' ,'remark'
    ];
}
