<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'dep_id', 'branch_id', 'emp_code', 'title', 'f_name','l_name', 'nickname', 'remark','assign_flg','trash'
    ];
}
