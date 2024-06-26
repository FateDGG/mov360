<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Tarjeta;
use App\Models\Alquiler;
use App\Models\Conductor;
use App\Models\Transporte;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarjetaController extends Controller
{
    //
    public function showTarjetaForm()
    {
        return view('components.tarjeta');
    }
    public function guardarTarjeta(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'id_usuario' => 'required|string',
            'titular'=> 'required|string',
            'numero'=> 'required|string',
            'mes'=> 'nullable|string',
            'anio'=> 'nullable|string',
            'cvv'=> 'required|max:3',
        ]);

        // Crear una nueva instancia del modelo Tarjeta
        $tarjeta = new Tarjeta();
        $tarjeta->id_usuario = $request->id_usuario;
        $tarjeta->titular = $request->titular;
        $tarjeta->numero = $request->numero;
        $tarjeta->mes = $request->mes;
        $tarjeta->anio = $request->anio;
        $tarjeta->cvv = $request->cvv;

        // Guardar la tarjeta en la base de datos
        $tarjeta->save();

        return redirect('/Profile');
        // dd($request->all());

    }
    public function mostrarTarjetas()
    {
        // Obtener el usuario logueado
        $user = Auth::user();
        $alquileres = Alquiler::where('id_usuario', $user->id)->get();
        // Obtener todas las tarjetas asociadas a este usuario
        $tarjetas = Tarjeta::where('id_usuario', $user->id)->get();
        $compras = Compra::where('id_usuario', $user->id)->get();
        $transportes = Transporte::where('id_usuario', $user->id)->get();
        $nombresConductores = $transportes->pluck('nombre_conductor')->unique();
        // Obtener todos los conductores que coinciden con los nombres obtenidos
        $conductores = Conductor::whereIn('nombre', $nombresConductores)->get();
        
        // Pasar las tarjetas a la vista
        return view('perfil', compact('tarjetas', 'alquileres', 'transportes', 'conductores','compras'));
        
    }
    
    public function eliminarTarjeta(Request $request){
    // Buscar la tarjeta por ID y eliminarla
        $tarjeta = Tarjeta::find($request->input('id'));

        if ($tarjeta) {
            $tarjeta->delete();
        }

        // Redirigir de vuelta al perfil con un mensaje de éxito
        return redirect('/Profile')->with('success', 'Tarjeta eliminada exitosamente');
    }

}
