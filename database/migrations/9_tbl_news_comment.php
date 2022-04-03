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
        Schema::create('tbl_news_comment', function (Blueprint $table) {
            $table->id('id_news_comment');
            $table->bigInteger('news_id')->unsigned()->index();;
            $table->bigInteger('user_id')->unsigned()->index();;
            $table->text('comment');
            $table->bigInteger('parent_comment');
            $table->foreign('user_id')->references('user_id')->on('tbl_user')->onDelete('cascade');
            $table->foreign('news_id')->references('news_id')->on('tbl_news')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_news_comment');
    }
};
