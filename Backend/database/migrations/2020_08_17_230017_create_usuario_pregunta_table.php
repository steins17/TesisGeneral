<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_pregunta', function (Blueprint $table) {
            $table->id();
            $table->tipo();
            $table->usuario_crea();
            $table->usuario_modifica();
            $table->timestamps();

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');

            $table->unsignedBigInteger('id_nivel');
            $table->foreign('id_nivel')->references('id')->on('nivel');

            $table->unsignedBigInteger('id_subnivel');
            $table->foreign('id_subnivel')->references('id')->on('subnivel');

            $table->unsignedBigInteger('id_pre_nive');
            $table->foreign('id_pre_nive')->references('id')->on('preguntas_nivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_pregunta');
    }
}
