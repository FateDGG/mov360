<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class CarrosController extends Controller
{
    public function showVehiculos()
    {
        $vehiculos = Vehiculo::all(); // Obtener todos los restaurantes de la base de datos
        return view('Alquilar_Vehiculo')->with('vehiculos', $vehiculos);; // Pasar los restaurantes a la vista
    }
}
