<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'm_no','name', 'desc', 'm_g_id', 'max','min', 'status' , 'trash', 'unit_id', 'branch_id'
    ];
}
