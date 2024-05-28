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
        Schema::table('conductores', function (Blueprint $table) {
            $table->string('telefono')->after('nombre')->nullable();
            $table->string('color_auto')->after('placa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conductores', function (Blueprint $table) {
            $table->dropColumn('telefono');
            $table->dropColumn('color_auto');
        });
    }
};
