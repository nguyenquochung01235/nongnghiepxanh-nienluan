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
        Schema::create('animal_soa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('animal_animal_id')->unsigned()->index();
            $table->foreign('animal_animal_id')->references('animal_id')->on('tbl_animal')->onDelete('cascade');
            $table->bigInteger('soa_soa_id')->unsigned()->index();
            $table->foreign('soa_soa_id')->references('soa_id')->on('tbl_soa')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_animal_soa');
    }
};
