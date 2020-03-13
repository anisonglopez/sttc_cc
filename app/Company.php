<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = 
    [
        'com_no', 'name_th', 'name_en', 'short_name','tax_id', 'tel', 'fax', 'email', 'add_th', 'add_en', 'trash'
    ];
}
