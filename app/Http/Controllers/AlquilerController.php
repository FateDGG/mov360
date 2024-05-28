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
        $alquiler->precio_total = $request->input('precioTotal');
        $alquiler->lugar_recogida = $request->input('lugarRecogida');
        $alquiler->lugar_entrega = $request->input('lugarEntrega');
        $alquiler->fecha_entrega = $request->input('fechaEntrega');
        $alquiler->fecha_recogida = $request->input('fechaRecogida');
        $alquiler->hora_entrega = $request->input('horaEntrega');
        $alquiler->hora_recogida = $request->input('horaRecogida');
        $alquiler->forma_pago = $request->input('formaPago');
        $alquiler->save();

        return redirect('/')->with('success', 'Alquiler guardado correctamente');
    }

}
