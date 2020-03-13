<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepInBranch extends Model
{
    //
    protected $fillable = 
    [
        'dep_id', 'branch_id'
    ];
}
