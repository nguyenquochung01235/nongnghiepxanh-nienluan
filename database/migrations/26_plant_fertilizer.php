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
        Schema::create('fertilizer_plant', function (Blueprint $table) {
            $table->id('id_fertilizer_plant');
            $table->bigInteger('plant_plant_id')->unsigned()->index();
            $table->foreign('plant_plant_id')->references('plant_id')->on('tbl_plant')->onDelete('cascade');
            $table->bigInteger('fertilizer_fertilizer_id')->unsigned()->index();
            $table->foreign('fertilizer_fertilizer_id')->references('fertilizer_id')->on('tbl_fertilizer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_ferlizer');
    }
};
