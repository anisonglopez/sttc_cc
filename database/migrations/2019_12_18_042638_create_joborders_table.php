<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joborders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_no')->nullable();
            $table->string('job_title')->nullable();
            $table->string('ma_no')->nullable();
            $table->date('request_date')->nullable();
            $table->time('request_time')->nullable();
            $table->string('request_by');
            $table->longText('desc')->nullable();
            $table->string('asset_owner_dep_id');
            $table->string('location_name');
            $table->string('request_dep_id');
            $table->string('tel')->nullable();
            $table->string('assign_as');
            $table->string('assignee');
            $table->string('job_type_id');
            $table->string('remark')->nullable();
            $table->string('branch_id');
            $table->string('job_status_id');
            $table->string('created_by')->nullable();
            $table->string('priority_id')->nullable();
            $table->string('schedule_start_date')->nullable();
            $table->string('schedule_start_time')->nullable();
            $table->string('schedule_end_date')->nullable();
            $table->string('schedule_end_time')->nullable();
            $table->bigInteger('trash')->default(0);
            $table->string('joborder_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joborders');
    }
}
