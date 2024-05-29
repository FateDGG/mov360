<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Auth;
use App\Models\Transporte;
use App\Models\Conductor;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\DB;

class TransporteController extends Controller
{
    //
    public function showFormulario()
    {
        // Obtener las tarjetas asociadas al usuario autenticado
        $tarjetas = Tarjeta::where('id_usuario', auth()->id())->get();

        // Obtener los nombres de los conductores que están en viajes activos
        $nombresConductoresEnViajesActivos = DB::table('transportes')
            ->where('estado', 'activo')
            ->pluck('nombre_conductor'); // Asegúrate de que 'nombre_conductor' sea la columna correcta

        // Obtener todos los conductores disponibles cuyos nombres no están en viajes activos
        $conductores = Conductor::whereNotIn('nombre', $nombresConductoresEnViajesActivos)->get();

        // Retornar la vista con las tarjetas y los conductores
        return view('transporte', ['tarjetas' => $tarjetas, 'conductores' => $conductores]);
    }
    public function solicitarTransporte(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $idUsuario = auth()->id();
    
        // Obtener un conductor de forma aleatoria
        $conductor = Conductor::inRandomOrder()->first();
    
        // Verificar si hay conductores disponibles
        if (!$conductor) {
            // Redirigir a la vista con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'No hay conductores disponibles. Inténtalo de nuevo más tarde.']);
        }
    
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
    
        // Redirigir al perfil del usuario con un mensaje de éxito
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
