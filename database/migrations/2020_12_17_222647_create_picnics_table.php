<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicnicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picnics', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name');
            $table->date('time');
            $table->text('address');
            $table->string('price');
            $table->string('name_parent');
            $table->text('picnic_avatar');
            $table->longText('description');
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
        Schema::dropIfExists('picnics');
    }
}
