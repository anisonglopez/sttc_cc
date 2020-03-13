<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joborder_head extends Model
{
    protected $fillable = [
        'job_no', 'job_title', 'request_date', 'request_time', 'request_by',
        'desc','tel','branch_id','created_by','trash', 'joborder_status'
    ];
}
