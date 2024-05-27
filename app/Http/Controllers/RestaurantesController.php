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
    public function mostrarPorCategoria(Request $request) 
    {
        $tipoCocina = $request->query('categoria');
        $restaurantes = Restaurante::where('tipo_cocina', $tipoCocina)->get();
        $imagenSrc = $request->query('imagenSrc');
        return view('Secciones')->with([
            'restaurantes' => $restaurantes,
            'tipoCocina' => $tipoCocina,
            'imagenSrc' => $imagenSrc
        ]);
    }
    public function show(Request $request)
    {
        // Obtener el ID del restaurante desde la solicitud
        $nombre = $request->query('nombre');
        
        // Buscar el restaurante por nombre
        $restaurante = Restaurante::where('nombre', $nombre)->firstOrFail();

        // Pasar el restaurante a la vista
        return view('restaurante', compact('restaurante'));
    }
    
    
}
