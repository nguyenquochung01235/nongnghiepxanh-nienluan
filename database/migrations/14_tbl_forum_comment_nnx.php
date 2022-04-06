<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_forum_comment', function (Blueprint $table) {
            $table->id('forum_comment_id');
            $table->text('comment');
            $table->bigInteger('forum_id')->unsigned()->index();
            $table->foreign('forum_id')->references('forum_id')->on('tbl_forum')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('user_id')->on('tbl_user')->onDelete('cascade');
            $table->bigInteger('parent_comment');
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
        Schema::dropIfExists('tbl_forum_comment');
    }
};
