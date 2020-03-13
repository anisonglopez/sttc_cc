<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outtype extends Model
{
    protected $fillable = [
        'name', 'desc', 'trash'
    ];
}
