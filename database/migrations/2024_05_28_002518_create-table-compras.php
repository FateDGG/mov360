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
            $table->string('valor');
            $table->string('descripcion');
            $table->timestamps();

            // Definir la clave forán
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
