<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('retire_no');
            $table->string('outtype_id');
            $table->string('desc')->nullable();
            $table->string('retire_by');
            $table->string('branch_id');
            $table->bigInteger('trash')->default(0);
            $table->string('retire_status')->nullable();
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
        Schema::dropIfExists('retires');
    }
}
