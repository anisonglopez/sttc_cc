<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = 
    [
        'com_id', 'branch_no', 'name_th','name_en','short_name','tel','fax','email','add_th','add_en','bu_id', 'trash'
    ];
}
