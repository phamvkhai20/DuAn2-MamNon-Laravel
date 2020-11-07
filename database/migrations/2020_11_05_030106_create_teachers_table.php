<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('password');
            $table->text('avatar');
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->integer('teacher_type_id')->unsigned();
            $table->foreign('teacher_type_id')->references('id')->on('teacher_types')->onDelete('cascade');
            $table->integer('status');
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
        Schema::dropIfExists('teachers');
    }
}
