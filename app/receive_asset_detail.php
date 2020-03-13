<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receive_asset_detail extends Model
{
    protected $fillable = [
        'receive_id', 'a_id', 'asset_status', 'qty_balance_as'
    ];
}
