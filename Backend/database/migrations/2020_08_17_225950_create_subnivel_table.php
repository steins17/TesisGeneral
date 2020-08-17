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
            $table->id();
            $table->nombre();
            $table->descripcion();
            $table->foto();
            $table->audio();
            $table->usuario_crea();
            $table->usuario_modifica();
            $table->timestamps();

            
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
