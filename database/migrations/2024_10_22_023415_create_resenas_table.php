<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('resenas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('libro_id');
        $table->unsignedBigInteger('usuario_id');
        $table->text('comentario');
        $table->integer('puntuacion');
        $table->timestamps();

        $table->foreign('libro_id')->references('id')->on('libros');
        $table->foreign('usuario_id')->references('id')->on('usuarios');
    });
}

};
