<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttemptAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempt_assignment', function (Blueprint $table) {
            $table->bigIncrements('attempt_assignment_id');
            $table->bigInteger('assignment_id');
            $table->tinyInteger('status')->nullable();
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
        Schema::drop('attempt_assignment');
    }
}