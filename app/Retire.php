<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retire extends Model
{
    protected $fillable = [
        'retire_no', 'outtype_id', 'desc', 'retire_by', 'branch_id', 'trash' , 'retire_status'
    ];
}
