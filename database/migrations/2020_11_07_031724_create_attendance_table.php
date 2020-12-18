<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kid_id')->unsigned();
            $table->foreign('kid_id')->references('id')->on('kids')->onDelete('cascade');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->date('date');
            $table->integer('teacher_1')->nullable();
            $table->integer('teacher_2')->nullable();
            $table->integer('status')->nullable();
            $table->text('note');
            $table->time('arrival_time');
            $table->time('leave_time');
            $table->string('meal');
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
        Schema::dropIfExists('attendance');
    }
}
