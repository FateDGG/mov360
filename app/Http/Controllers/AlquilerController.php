<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\Auth;

class AlquilerController extends Controller
{
    //
    public function procesarFormulario(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $devolucion = $request->input('devolucion');
        $edadConductor = $request->input('edadConductor');
        $aeropuertoCiudad = $request->input('aeropuertoCiudad');
        $fechaRecogida = $request->input('fechaRecogida');
        $horaRecogida = $request->input('horaRecogida');
        $fechaEntrega = $request->input('fechaEntrega');
        $horaEntrega = $request->input('horaEntrega');
        $modelo = $request->input('modelo');
        $marca = $request->input('marca');
        $precio = $request->input('precio');
        $tarjetas = Tarjeta::where('id_usuario', Auth::id())->get();

        // Pasar las tarjetas a la vista
        // Redirigir a la vista de pagos con los datos del formulario
        return view('pagarAlquilado', [
            'devolucion' => $devolucion,
            'edadConductor' => $edadConductor,
            'aeropuertoCiudad' => $aeropuertoCiudad,
            'fechaRecogida' => $fechaRecogida,
            'horaRecogida' => $horaRecogida,
            'fechaEntrega' => $fechaEntrega,
            'horaEntrega' => $horaEntrega,
            'marca' => $marca,
            'modelo' => $modelo,
            'precio' => $precio,
            'tarjetas' => $tarjetas,
        ]);
        // dd($request->all());
    }

}
