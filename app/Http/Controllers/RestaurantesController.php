<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestaurantesController extends Controller
{
    //
    public function showRestaurants()
    {
        $restaurantes = Restaurante::all(); // Obtener todos los restaurantes de la base de datos
        return view('Domicilios')->with('restaurantes', $restaurantes);; // Pasar los restaurantes a la vista
    }
}
