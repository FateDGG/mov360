<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

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

        return redirect('/');
        // dd($request->all());

    }
    

}
