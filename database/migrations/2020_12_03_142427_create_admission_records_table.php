<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_kid');
            $table->string('address1');
            $table->string('address2');
            $table->date('birthday');
            $table->integer('sex');
            $table->string('full_name_father');
            $table->string('number_phone_father');
            $table->string('job_father');
            $table->string('work_plance_father');
            $table->string('full_name_mother');
            $table->string('number_phone_mother');
            $table->string('job_mother');
            $table->string('work_plance_mother');
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
        Schema::dropIfExists('admission_records');
    }
}