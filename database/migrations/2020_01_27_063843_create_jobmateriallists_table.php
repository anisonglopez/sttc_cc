<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobmateriallistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobmateriallists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_id');
            $table->bigInteger('qty_out');
            $table->bigInteger('qty_in')->nullable();
            $table->bigInteger('stock_balance_as');
            $table->string('m_id');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('jobmateriallists');
    }
}
