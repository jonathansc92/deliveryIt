<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->integer('corredores_id')->unsigned();
            $table->foreign('corredores_id')->references('id')->on('corredores');
            $table->integer('provas_id')->unsigned();
            $table->foreign('provas_id')->references('id')->on('provas');
            $table->time('hora_inicio');
            $table->time('hora_conclusao');
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
        Schema::dropIfExists('resultados');
    }
}
