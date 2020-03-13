<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assetgroup extends Model
{
    protected $fillable = 
    [
        'name', 'useful', 'desc', 'depreciation_rate','branch_id','trash'
    ];
}
