<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_id');
            $table->string('a_g_id');
            $table->string('asset_m_no');
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('desc')->nullable();
            $table->bigInteger('trash')->default(0);
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
        Schema::dropIfExists('assetmodels');
    }
}
