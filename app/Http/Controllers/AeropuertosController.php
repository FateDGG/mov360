<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aeropuerto;
use App\Models\Alquiler;
use App\Models\Vehiculo;

class AeropuertosController extends Controller
{
    //
    public function showAeropuertos()
    {
        $alquileres = Alquiler::all();
        $aeropuertos = Aeropuerto::all('nombre'); 
        $vehiculos = Vehiculo::all();// Obtener todos los restaurantes de la base de datos
        $vehiculosAlquilados = Alquiler::pluck('vehiculo_nombre');

    // Filtrar los vehículos que no están alquilados
    $vehiculosDisponibles = $vehiculos->filter(function($vehiculo) use ($vehiculosAlquilados) {
        return !$vehiculosAlquilados->contains($vehiculo->modelo);
    });

    // Pasar los vehículos disponibles a la vista
    
        return view('alquilar')->with('aeropuertos', $aeropuertos)->with('vehiculos', $vehiculos)->with('alquileres', $alquileres)->with('vehiculos', $vehiculosDisponibles); // Pasar los restaurantes a la vista
    }
}
