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
        Schema::create('tbl_fertilizer', function (Blueprint $table) {
            $table->id('fertilizer_id');
            $table->string('fertilizer_name');
            $table->longText('fertilizer_description');
            $table->string('fertilizer_img_1');
            $table->string('fertilizer_img_2');
            $table->string('fertilizer_img_3');
            $table->bigInteger('category_fertilizer_id')->unsigned()->index();;
            $table->foreign('category_fertilizer_id')->references('category_fertilizer_id')->on('tbl_category_fertilizer')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_fertilizer');
    }
};
