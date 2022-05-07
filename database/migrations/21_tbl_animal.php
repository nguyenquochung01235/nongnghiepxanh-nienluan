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
        Schema::create('tbl_animal', function (Blueprint $table) {
            $table->id('animal_id');
            $table->string('animal_name');
            $table->longText('animal_description');
            $table->string('animal_img_1');
            $table->string('animal_img_2');
            $table->string('animal_img_3');
            $table->bigInteger('toa_id')->unsigned()->index();;
            $table->foreign('toa_id')->references('toa_id')->on('tbl_type_of_animal')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_animal');
    }
};
