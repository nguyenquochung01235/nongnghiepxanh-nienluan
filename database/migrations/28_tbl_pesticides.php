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
        Schema::create('tbl_pesticides', function (Blueprint $table) {
            $table->id('pesticides_id');
            $table->string('pesticides_name');
            $table->longText('pesticides_description');
            $table->string('pesticides_img_1');
            $table->string('pesticides_img_2');
            $table->string('pesticides_img_3');
            $table->bigInteger('category_pesticides_id')->unsigned()->index();;
            $table->foreign('category_pesticides_id')->references('category_pesticides_id')->on('tbl_category_pesticides')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_pesticides');
    }
};
