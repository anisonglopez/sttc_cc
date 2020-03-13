<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkinstatus extends Model
{
    protected $fillable = [
        'name', 'desc','operator', 'trash'
    ];
}
