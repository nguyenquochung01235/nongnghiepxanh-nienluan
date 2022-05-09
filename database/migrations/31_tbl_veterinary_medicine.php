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
        Schema::create('tbl_vm', function (Blueprint $table) {
            $table->id('vm_id');
            $table->string('vm_name');
            $table->longText('vm_description');
            $table->string('vm_img_1');
            $table->string('vm_img_2');
            $table->string('vm_img_3');
            $table->bigInteger('category_vm_id')->unsigned()->index();;
            $table->foreign('category_vm_id')->references('category_vm_id')->on('tbl_category_vm')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_vm');
    }
};
