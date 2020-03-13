<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $fillable = [
        'name', 'code', 'remark', 'trash','color_code','noti_flag','expire_date'
    ];
}
