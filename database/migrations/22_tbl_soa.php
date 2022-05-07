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
        Schema::create('tbl_soa', function (Blueprint $table) {
            $table->id('soa_id');
            $table->string('soa_name');
            $table->longText('soa_description');
            $table->string('soa_img_1');
            $table->string('soa_img_2');
            $table->string('soa_img_3');
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
        Schema::dropIfExists('tbl_soa');
    }
};
