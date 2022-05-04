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
        Schema::create('tbl_sop', function (Blueprint $table) {
            $table->id('sop_id');
            $table->string('sop_name');
            $table->longText('sop_description');
            $table->string('sop_img_1');
            $table->string('sop_img_2');
            $table->string('sop_img_3');
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
        Schema::dropIfExists('tbl_sop');
    }
};
