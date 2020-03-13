<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive_Detail extends Model
{
    protected $fillable = [
        'receive_id', 'm_id', 'qty_in', 'qty_balance_as'
    ];
}
