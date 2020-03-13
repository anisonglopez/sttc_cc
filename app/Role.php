<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'branch_id',
        'role_name', 
        'desc', 
    ];
    //
}
