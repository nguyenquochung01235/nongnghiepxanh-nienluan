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
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('news_title', 255);
            $table->longText('news_content');
            $table->string('news_img',255);
            $table->string('news_hastag', 50);
            $table->integer('active');
            $table->bigInteger('admin_id')->unsigned()->index();
            $table->bigInteger('id_news_category')->unsigned()->index();
            $table->foreign('admin_id')->references('admin_id')->on('tbl_admin')->onDelete('cascade');
            $table->foreign('id_news_category')->references('id_news_category')->on('tbl_news_category')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_news');
    }
};
