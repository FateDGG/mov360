<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aeropuerto;
use App\Models\Vehiculo;

class AeropuertosController extends Controller
{
    //
    public function showAeropuertos()
    {
        $aeropuertos = Aeropuerto::all('nombre'); 
        $vehiculos = Vehiculo::all();// Obtener todos los restaurantes de la base de datos
        return view('alquilar')->with('aeropuertos', $aeropuertos)->with('vehiculos', $vehiculos); // Pasar los restaurantes a la vista
    }
}
