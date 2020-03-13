<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // $table->string('fname');
            $table->string('lname');
            $table->string('dep_id');
            $table->string('branch_id');
            $table->string('email')->unique();
            $table->string('email_real');
            $table->bigInteger('status')->default(0);
            // $table->bigInteger('user_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
