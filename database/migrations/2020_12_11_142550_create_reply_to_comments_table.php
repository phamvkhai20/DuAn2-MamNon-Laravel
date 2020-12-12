<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_to_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('form_comment')->onDelete('cascade');
            $table->integer('response_comment_id')->unsigned();
            $table->foreign('response_comment_id')->references('id')->on('comment_response_form')->onDelete('cascade');
            $table->integer('contact_book_id')->unsigned();
            $table->foreign('contact_book_id')->references('id')->on('contact_book')->onDelete('cascade');
            $table->string('note');
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
        Schema::dropIfExists('reply_to_comments');
    }
}
