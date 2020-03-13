<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intype extends Model
{
    protected $fillable = [
        'name', 'desc', 'trash'
    ];
}
