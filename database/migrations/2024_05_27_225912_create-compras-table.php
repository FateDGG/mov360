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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario');
            $table->string('detalle');
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
