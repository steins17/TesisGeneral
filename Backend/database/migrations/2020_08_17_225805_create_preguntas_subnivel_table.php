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
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->text('foto')->nullable();
            $table->text('audio')->nullable();
            $table->text('oraciones')->nullable();
            $table->string('tipo');
            $table->string('estado');
            $table->integer('tipo_campo');
            $table->string('valor_campo');
            $table->string('respuesta_campo');
            $table->timestamps();

            $table->unsignedBigInteger('usuario_crea');
            $table->foreign('usuario_crea')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_modifica')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('id_nivel');
            $table->foreign('id_nivel')->references('id')->on('nivel');
            
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
