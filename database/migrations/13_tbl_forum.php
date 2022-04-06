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
        Schema::create('tbl_forum', function (Blueprint $table) {
            $table->id('forum_id');
            $table->string('forum_title');
            $table->string('forum_img_1');
            $table->string('forum_img_2');
            $table->string('forum_img_3');
            $table->longText('forum_content');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('user_id')->on('tbl_user')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_forum');
    }
};
