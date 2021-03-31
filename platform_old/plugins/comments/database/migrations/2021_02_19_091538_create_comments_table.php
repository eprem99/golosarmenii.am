<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comment');
        Schema::dropIfExists('comments_replies');

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->unsigned()->index()->references('id')->on('posts');
            $table->string('name', 60);
            $table->string('email', 60);
            $table->text('content');
            $table->string('status', 60)->default('unapprove');
            $table->timestamps();
        });
        // Schema::table('comment', function (Blueprint $table) {
        //     $table->integer('post_id')->unsigned()->index()->references('id')->on('posts');
        // });
        Schema::create('comments_replies', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->integer('comments_id');
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
        Schema::dropIfExists('comment');
        Schema::dropIfExists('comments_replies');
    }
}
