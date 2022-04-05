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
        Schema::create('tbl_commune', function (Blueprint $table) {
            $table->id('commune_id');
            $table->string('commune_name');
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
        Schema::dropIfExists('tbl_commune');
    }
};
