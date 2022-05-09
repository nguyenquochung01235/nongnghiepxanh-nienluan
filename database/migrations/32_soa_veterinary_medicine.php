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
        Schema::create('soa_veterinarymedicine', function (Blueprint $table) {
            $table->id('id_soa_veterinarymedicine');
            $table->bigInteger('soa_soa_id')->unsigned()->index();
            $table->foreign('soa_soa_id')->references('soa_id')->on('tbl_soa')->onDelete('cascade');
            $table->bigInteger('veterinarymedicine_vm_id')->unsigned()->index();
            $table->foreign('veterinarymedicine_vm_id')->references('vm_id')->on('tbl_vm')->onDelete('cascade');
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
        Schema::dropIfExists('soa_veterinarymedicine');
    }
};
