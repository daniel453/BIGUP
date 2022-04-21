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
        Schema::create('compañias',function (blueprint $table)
        {
            $table->id();
            $table->string('nombre_compania');
            $table->bigInteger('num_compania');
            $table->Integer('cod_batallon');
            $table->integer('personal_compania');
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
        Schema::dropIfExists('compañias');
    }
};
