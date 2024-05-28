<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_restaurante');
            $table->string('nombre_plato');
            $table->string('descripcion');
            $table->string('precio'); // Precio con 2 decimales
            $table->string('url_imagen')->nullable(); // URL de la imagen del plato (opcional)
            $table->timestamps();
            
            // Definir una clave externa para la relación con la tabla de restaurantes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
