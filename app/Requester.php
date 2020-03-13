<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requester extends Model
{
    protected $fillable = [
        'name', 'branch_id', 'trash' 
    ];
}
