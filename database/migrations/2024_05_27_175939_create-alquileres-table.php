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
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario');
            $table->string('vehiculo_nombre');
            $table->string('vehiculo_modelo');
            $table->decimal('precio_total', 8, 2);
            $table->string('lugar_recogida');
            $table->string('lugar_entrega');
            $table->string('fecha_entrega');
            $table->string('fecha_recogida');
            $table->string('hora_entrega');
            $table->string('hora_recogida');
            $table->string('forma_pago');
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
