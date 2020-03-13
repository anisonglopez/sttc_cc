<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businessunit extends Model
{
    protected $fillable = 
    [
        'bu_no', 'name', 'desc', 'trash'
    ];
}
