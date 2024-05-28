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
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario');
            $table->string('lugar_recogida');
            $table->string('lugar_destino');
            $table->string('medio_pago');
            $table->string('nombre_conductor');
            $table->string('precio');
            $table->timestamps();


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
