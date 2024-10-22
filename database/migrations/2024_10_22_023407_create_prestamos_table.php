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
    Schema::create('prestamos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('usuario_id');
        $table->unsignedBigInteger('libro_id');
        $table->date('fecha_prestamo');
        $table->date('fecha_devolucion');
        $table->timestamps();
        
        $table->foreign('usuario_id')->references('id')->on('usuarios');
        $table->foreign('libro_id')->references('id')->on('libros');
    });
}

};
