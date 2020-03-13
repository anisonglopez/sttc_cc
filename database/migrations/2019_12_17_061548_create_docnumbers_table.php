<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docnumbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module_id')->unique();
            $table->string('desc')->nullable();
            $table->string('prefix');
            $table->bigInteger('length_num')->default(0);
            $table->string('start_num');
            $table->string('end_num');
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
        Schema::dropIfExists('docnumbers');
    }
}
