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
        Schema::create('tbl_job', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_name',150);
            $table->double('job_salary');
            $table->bigInteger('department_id')->unsigned()->index();
            $table->foreign('department_id')->references('department_id')->on('tbl_department')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_job');
    }
};
