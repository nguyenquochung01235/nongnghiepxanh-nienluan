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
        Schema::create('pesticides_sop', function (Blueprint $table) {
            $table->id('id_pesticides_sop');
            $table->bigInteger('sop_sop_id')->unsigned()->index();
            $table->foreign('sop_sop_id')->references('sop_id')->on('tbl_sop')->onDelete('cascade');
            $table->bigInteger('pesticides_pesticides_id')->unsigned()->index();
            $table->foreign('pesticides_pesticides_id')->references('pesticides_id')->on('tbl_pesticides')->onDelete('cascade');
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
        Schema::dropIfExists('pesticides_sop');
    }
};
