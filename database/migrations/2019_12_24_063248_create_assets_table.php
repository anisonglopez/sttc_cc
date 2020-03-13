<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_id');
            $table->string('asset_no');
            $table->string('a_m_id');
            $table->string('asset_status');
            $table->string('serial_no')->nullable();
            $table->string('refer_doc')->nullable();
            $table->date('acqu_date')->nullable();
            $table->date('deac_date')->nullable();
            $table->bigInteger('asset_value')->default(0)->nullable();
            $table->string('owner_dep')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
