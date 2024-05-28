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
    public function formularioCancelacionTransporte(Request $request)
        {
            $id = $request->input('id');

            // Obtener el alquiler por ID
            $transporte = Transporte::find($id);

            if (!$transporte) {
                return redirect('/Profile')->with('error_message', '¡Viaje no encontrado!');
            }

            // Pasar el alquiler a la vista de cancelación
            return view('cancelarTransporte', compact('transporte'));
        }
    
        public function cancelarViaje(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'transporte_id' => 'required|exists:transportes,id',
            'cancelReason' => 'required|string|max:255',
        ]);

        // Obtener el alquiler y eliminarlo
        $transporte = Transporte::find($request->transporte_id);
        
        if ($transporte) {
            // Puedes registrar la razón de la cancelación en un registro separado si es necesario
            $razon = $request->cancelReason;

            // Eliminar el alquiler
            $transporte->delete();
            
            // Redirigir con un mensaje de éxito
            return redirect('/Profile')->with('success_message', '¡Transporte cancelado con éxito!');
        }

        // Redirigir con un mensaje de error si no se encuentra el alquiler
        return redirect('/Profile')->with('error_message', '¡Transporte no encontrado!');
    }
}
