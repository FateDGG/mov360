<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    //
    public function index()
    {
        // Obtener todas las empresas desde la base de datos
        $conductores = Conductor::all();

        // Pasar los datos de las empresas a la vista
        return view('AdminConductores')->with('conductores', $conductores);
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'driverName' => 'required|string',
            'phone' => 'required|string',
            'vehicleColor' => 'required|string',
            'vehicleModel' => 'required|string',
            'vehiclePlate' => 'required|string',
        ]);

        // Crear un nuevo conductor con los datos del formulario
        Conductor::create([
            'nombre' => $request->input('driverName'),
            'telefono' => $request->input('phone'),
            'color_auto' => $request->input('vehicleColor'),
            'placa' => $request->input('vehiclePlate'),
            'vehiculo' => $request->input('vehicleModel'),
            // Añade más campos si es necesario
        ]);

        // Redirigir a una página de éxito o a donde desees
        return redirect('/AdminConduc')->with('success', 'Conductor agregado exitosamente');
    }

    public function destroy($id)
    {
        // Encuentra la empresa por su ID
        $conductor = Conductor::findOrFail($id);

        // Elimina la empresa de la base de datos
        $conductor->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminConduc')->with('success', 'Conductor correctamente.');
    }
}
