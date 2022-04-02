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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('admin_name', 60);
            $table->string('admin_email',255);
            $table->string('password',255);
            $table->string('admin_phone', 12);
            $table->date('admin_birthday');
            $table->string('admin_address',255);
            $table->string('admin_avatar',255);
            $table->integer('admin_active');
            $table->bigInteger('job_id')->unsigned()->index();
            $table->foreign('job_id')->references('job_id')->on('tbl_job')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_admin');
    }
};
