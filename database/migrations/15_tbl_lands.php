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
        Schema::create('tbl_lands', function (Blueprint $table) {
            $table->id('land_id');
            $table->string('land_title');
            $table->text('land_content');
            $table->string('land_img_1');
            $table->string('land_img_2');
            $table->string('land_img_3');
            $table->bigInteger('district_id')->unsigned()->index();;
            $table->foreign('district_id')->references('district_id')->on('tbl_district')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_lands');
    }
};
