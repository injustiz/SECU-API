<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_number', 30)->nullable();
            $table->string('username', 30)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 80)->nullable();
            $table->string('role', 30)->default("student");
            $table->string('curriculum', 20)->default("SE");
            $table->string('status', 20)->default("active");
            $table->text('token')->nullable();
            $table->dateTime('register_date')->nullable();
            $table->timestamp('last_update');
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
        Schema::drop('user');
    }
}
