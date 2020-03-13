<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetireDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retire__details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('remark')->nullable();
            $table->string('retire_id');
            $table->string('m_id');
            $table->string('qty_out');
            $table->string('qty_balance_as');
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
        Schema::dropIfExists('retire__details');
    }
}
