<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialgroup extends Model
{
    protected $fillable = [
        'material_code','name', 'desc', 'trash'
    ];
}
