<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joborder extends Model
{
    protected $fillable = [
        'job_no', 'job_title','ma_no', 'request_date', 'request_time', 'request_by',
        'desc', 'asset_owner_dep_id', 'location_name', 'request_dep_id', 'tel', 'assign_as', 'assignee',
        'job_type_id', 'remark', 'branch_id', 'job_status_id', 'created_by','priority_id',
        'schedule_start_date','schedule_start_time','schedule_end_date','schedule_end_time', 
        'trash', 'joborder_status'
    ];
}
