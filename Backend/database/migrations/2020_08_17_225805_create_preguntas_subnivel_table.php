<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasSubnivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_subnivel', function (Blueprint $table) {
            $table->id();
            $table->nombre();
            $table->descripcion();
            $table->foto();
            $table->audio();
            $table->oraciones();
            $table->tipo();
            $table->estado();
            $table->tipo_campo();
            $table->valor_campo();
            $table->respuesta_campo();
            $table->usuario_crea();
            $table->usuario_modifica();
            $table->timestamps();

            $table->unsignedBigInteger('id_subnivel');
            $table->foreign('id_subnivel')->references('id')->on('subnivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas_subnivel');
    }
}
