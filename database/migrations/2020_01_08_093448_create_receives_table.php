<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receive_no');
            $table->string('type_id');
            $table->string('desc')->nullable();
            $table->date('receive_date');
            $table->string('receive_by');
            $table->string('branch_id');
            $table->bigInteger('trash')->default(0);
            $table->string('receive_status')->nullable();
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
        Schema::dropIfExists('receives');
    }
}
