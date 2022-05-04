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
        Schema::create('plant_sop', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plant_plant_id')->unsigned()->index();
            $table->foreign('plant_plant_id')->references('plant_id')->on('tbl_plant')->onDelete('cascade');
            $table->bigInteger('sop_sop_id')->unsigned()->index();
            $table->foreign('sop_sop_id')->references('sop_id')->on('tbl_sop')->onDelete('cascade');
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
        Schema::dropIfExists('plant_sop');
    }
};
