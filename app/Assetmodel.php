<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assetmodel extends Model
{
    protected $fillable = 
    [
        'a_g_id','branch_id', 'asset_m_no', 'name_th', 'name_en', 'desc', 'trash'
    ];
}
