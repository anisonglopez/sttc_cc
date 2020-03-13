<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoborderHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joborder_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_no')->nullable();
            $table->string('job_title')->nullable();
            $table->string('created_by')->nullable();
            $table->longText('desc')->nullable();
            $table->string('branch_id');
            $table->bigInteger('trash')->default(0);
            $table->string('request_by');
            $table->string('tel')->nullable();
            $table->date('request_date')->nullable();
            $table->time('request_time')->nullable();
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
        Schema::dropIfExists('joborder_heads');
    }
}
