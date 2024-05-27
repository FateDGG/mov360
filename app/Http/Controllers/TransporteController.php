<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Auth;
use App\Models\Transporte;
use App\Models\Conductor;
use App\Models\Tarjeta;

class TransporteController extends Controller
{
    //
    public function showFormulario()
    {
        // Obtener las tarjetas asociadas al usuario autenticado
 // Obtener las tarjetas asociadas al usuario autenticado
        $tarjetas = Tarjeta::where('id_usuario', auth()->id())->get();

        // Obtener todos los conductores disponibles
        $conductores = Conductor::all();
        
        // Retornar la vista con las tarjetas y los conductores
        return view('transporte', ['tarjetas' => $tarjetas, 'conductores' => $conductores]);
 
        
        
    }
    public function solicitarTransporte(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $idUsuario = auth()->id();

        // Obtener el nombre del conductor de forma aleatoria
        $conductor = Conductor::inRandomOrder()->first();
        $precioAleatorio = rand(5000, 25000);

        // Crear una nueva instancia de Transporte y asignar los valores del formulario
        $transporte = new Transporte();
        $transporte->id_usuario = $idUsuario;
        $transporte->lugar_recogida = $request->input('lugar_recogida');
        $transporte->lugar_destino = $request->input('destino');
        $transporte->medio_pago = $request->input('metodo_pago');
        $transporte->nombre_conductor = $conductor->nombre; // Nombre del conductor aleatorio
        $transporte->precio = $precioAleatorio;

        // Guardar el transporte en la base de datos
        $transporte->save();

        // Puedes retornar una respuesta JSON u otro tipo de respuesta según lo necesites
        return redirect('/Profile')->with('success', 'Transporte guardado correctamente');
    }
    
}
