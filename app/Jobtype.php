<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtype extends Model
{
    protected $fillable = [
        'job_no','name', 'desc','trash'
    ];
}
