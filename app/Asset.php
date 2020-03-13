<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = 
    [
        'asset_no','asset_status','branch_id','dep_id', 'a_m_id', 'serial_no', 'refer_doc', 'acqu_date', 'deac_date', 'owner_dep','asset_value', 'trash'
    ];
}
