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
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name', 60);
            $table->string('user_email',255);
            $table->string('password',255);
            $table->string('user_phone', 12);
            $table->date('user_birthday');
            $table->string('user_address',255);
            $table->string('user_avatar',255);
            $table->integer('user_active');
            $table->integer('user_gender');
            $table->string('google_id',255);
            $table->string('facebook_id',255);
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
        Schema::dropIfExists('tbl_user');
    }
};
