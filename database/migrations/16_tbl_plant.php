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
        Schema::create('tbl_plant', function (Blueprint $table) {
            $table->id('plant_id');
            $table->string('plant_name');
            $table->longText('plant_description');
            $table->string('plant_img_1');
            $table->string('plant_img_2');
            $table->string('plant_img_3');
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
        //
    }
};
