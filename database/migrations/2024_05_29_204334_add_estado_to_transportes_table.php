<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transportes', function (Blueprint $table) {
            $table->string('estado')->after('nombre_conductor')->default('pendiente');
            // Reemplaza 'column_name' con el nombre de la columna después de la cual deseas agregar 'estado'.
            // Si quieres agregarlo al final, simplemente elimina '->after('column_name')'.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transportes', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
