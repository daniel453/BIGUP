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
        Schema::table('turnos',function (Blueprint $table)
        {
            $table->foreign('id_soldado')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_creador')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cod_batallon')->references('id')->on('batallons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
