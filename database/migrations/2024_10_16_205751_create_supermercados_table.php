<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupermercadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermercados', function (Blueprint $table) {
            $table->foreignId('id_tienda')->constrained('tiendas', 'id_tienda')->onDelete('cascade');
            $table->text('secciones')->nullable(); // Puedes normalizar esto si es necesario
            $table->text('promociones')->nullable();
            $table->primary('id_tienda');
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
        Schema::dropIfExists('supermercados');
    }
}
