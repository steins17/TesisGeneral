<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->dateTime('fecha_nacimiento', 0);
            $table->integer('edad');
            $table->string('telefono');
            $table->string('celular');
            $table->text('direccion');
            $table->timestamps();

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
