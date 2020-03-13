<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docnumber extends Model
{
    protected $fillable = [
        'module_id', 'desc', 'prefix', 'length_num','start_num', 'end_num'
    ];
}
