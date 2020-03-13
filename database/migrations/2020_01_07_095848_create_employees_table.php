<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dep_id');
            $table->string('branch_id');
            $table->string('emp_code');
            $table->string('title')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('nickname')->nullable();
            $table->string('remark')->nullable();
            $table->bigInteger('assign_flg')->default(0);
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
        Schema::dropIfExists('employees');
    }
}
