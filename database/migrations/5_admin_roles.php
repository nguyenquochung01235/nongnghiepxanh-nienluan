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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_admin_id')->unsigned()->index();
            $table->foreign('admin_admin_id')->references('admin_id')->on('tbl_admin')->onDelete('cascade');
            $table->bigInteger('roles_id_roles')->unsigned()->index();
            $table->foreign('roles_id_roles')->references('id_roles')->on('tbl_roles')->onDelete('cascade');
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
        Schema::dropIfExists('admin_roles');
    }
};
