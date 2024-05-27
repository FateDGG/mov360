<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aeropuerto;

class AeropuertosController extends Controller
{
    //
    public function showAeropuertos()
    {
        $aeropuertos = Aeropuerto::all('nombre'); // Obtener todos los restaurantes de la base de datos
        return view('alquilar')->with('aeropuertos', $aeropuertos);; // Pasar los restaurantes a la vista
    }
}
