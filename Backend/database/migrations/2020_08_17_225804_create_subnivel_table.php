<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubnivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnivel', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->text('foto')->nullable();
            $table->text('audio')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('usuario_crea');
            $table->foreign('usuario_crea')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('usuario_modifica')->nullable();
            $table->foreign('usuario_modifica')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_nivel');
            $table->foreign('id_nivel')->references('id')->on('nivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subnivel');
    }
}
