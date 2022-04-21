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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->date('fecha');
            $table->string('horario');
            $table->timestamps();


            $table->unsignedBigInteger('id_soldado')->unique();
            $table->unsignedBigInteger('id_creador');
            $table->unsignedBigInteger('cod_batallon');
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
