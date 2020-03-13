<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobstatus extends Model
{
    protected $fillable = [
        'name', 'desc','code', 'trash'
    ];
}
