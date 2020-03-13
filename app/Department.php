<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = 
    [
        'dep_code','name_th', 'name_en', 'trash'
    ];
}
