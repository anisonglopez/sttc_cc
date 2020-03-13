<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $fillable = [
        'receive_no', 'type_id', 'desc', 'receive_date', 'receive_by', 'branch_id', 'trash' , 'receive_status'
    ];
}
