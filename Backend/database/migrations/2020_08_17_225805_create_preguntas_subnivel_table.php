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
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->text('foto')->nullable();
            $table->text('audio')->nullable();
            $table->text('oraciones')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->string('valor_campo')->nullable();
            $table->string('nivel')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_subnivel')->nullable();
            $table->foreign('id_subnivel')->references('id')->on('subnivel')->onDelete('cascade');

            $table->unsignedBigInteger('usuario_crea');
            $table->foreign('usuario_crea')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_modifica')->references('id')->on('users')->onDelete('cascade');
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
