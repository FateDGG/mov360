<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\Auth;
use App\Models\Alquiler;
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
    public function guardarAlquiler(Request $request)
    {
        $alquiler = new Alquiler();
        $alquiler->id_usuario = $request->input('id_usuario');
        $alquiler->vehiculo_nombre = $request->input('vehiculoNombre');
        $alquiler->vehiculo_modelo = $request->input('vehiculoModelo');
        $precioTotal = $request->input('precioTotal');
        if (is_numeric($precioTotal)) {
            $alquiler->precio_total = $precioTotal;
        } else {
            return redirect('/')->with('error', 'Selecciona todos los datos de tu solicitud.');
        }
        $alquiler->lugar_recogida = $request->input('lugarRecogida');
        $alquiler->lugar_entrega = $request->input('lugarEntrega');
        $alquiler->fecha_entrega = $request->input('fechaEntrega');
        $alquiler->fecha_recogida = $request->input('fechaRecogida');
        $alquiler->hora_entrega = $request->input('horaEntrega');
        $alquiler->hora_recogida = $request->input('horaRecogida');
        $alquiler->forma_pago = $request->input('formaPago');
        $alquiler->save();

        return redirect('/')->with('success', 'Pago exitoso. Alquiler Confirmado');
    }

        public function mostrarFormularioCancelacion(Request $request)
        {
            $id = $request->input('id');

            // Obtener el alquiler por ID
            $alquiler = Alquiler::find($id);

            if (!$alquiler) {
                return redirect()->route('home')->with('error_message', '¡Alquiler no encontrado!');
            }

            // Pasar el alquiler a la vista de cancelación
            return view('cancelarAlquiler', compact('alquiler'));
        }
        public function cancelar(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'alquiler_id' => 'required|exists:alquileres,id',
            'cancelReason' => 'required|string|max:255',
        ]);

        // Obtener el alquiler y eliminarlo
        $alquiler = Alquiler::find($request->alquiler_id);
        
        if ($alquiler) {
            // Puedes registrar la razón de la cancelación en un registro separado si es necesario
            $razon = $request->cancelReason;

            // Eliminar el alquiler
            $alquiler->delete();
            
            // Redirigir con un mensaje de éxito
            return redirect('/Profile')->with('success_message', '¡Alquiler cancelado con éxito!');
        }

        // Redirigir con un mensaje de error si no se encuentra el alquiler
        return redirect('/Profile')->with('error_message', '¡Alquiler no encontrado!');
    }


}
