<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('m_no');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('branch_id');
            $table->bigInteger('m_g_id')->nullable();
            $table->bigInteger('max')->default(0);
            $table->bigInteger('min')->default(0);
            $table->bigInteger('status')->default(0);
            $table->bigInteger('trash')->default(0);
            $table->bigInteger('unit_id')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
