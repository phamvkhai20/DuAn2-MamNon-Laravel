<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildReceiptHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_receipt_history', function (Blueprint $table) {
            $table->id();
            $table->integer('kid_id');
            $table->integer('parent_id');
            $table->integer('attendance');
            $table->string('name');
            $table->string('image');
            $table->string('phone');
            $table->string('address');
            $table->string('relationship');
            $table->string('date');
            $table->integer('confirm');
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
        Schema::dropIfExists('child_receipt_history');
    }
}