<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Conductor;
use App\Models\Transporte;
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
            'password'=> 'required|string',
            'email' => 'required|string|email|max:255|unique:clientes',
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

        $cliente = new Cliente();
        $cliente->nombre = $request->input('driverName');
        $cliente->telefono = $request->input('phone');
        $cliente->email = $request->input('email');
        $cliente->password = bcrypt($request->input('password'));
        $cliente->role = 'driver';
        $cliente->documento = null;
        $cliente->genero= null;
        $cliente->fechaNac= null;
        $cliente->save();

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
    public function mostrarPanelConductor(Request $request)
    {
        // Obtener el conductor autenticado
        $conductor = auth()->user(); // Suponiendo que el conductor está autenticado y la autenticación está configurada correctamente
        $nombreConductor = $conductor->nombre;
    
        // Obtener las solicitudes de servicio entrantes y el historial de servicios
        $solicitudesEntrantes = Transporte::where('nombre_conductor', $nombreConductor)->where('estado', 'pendiente')->get();
        $historialServicios = Transporte::where('nombre_conductor', $nombreConductor)->where('estado', 'completado')->get();
        $serviciosActivos = Transporte::where('nombre_conductor', $nombreConductor)->where('estado', 'activo')->get();

        // Obtener los clientes relacionados con las solicitudes y el historial
        $idsUsuarios = $solicitudesEntrantes->pluck('id_usuario')->merge($historialServicios->pluck('id_usuario'))->merge($serviciosActivos->pluck('id_usuario'))->unique();
        $clientes = Cliente::whereIn('id', $idsUsuarios)->get()->keyBy('id');
    
        // Pasar los datos a la vista
        return view('conductoView', [
            'solicitudesEntrantes' => $solicitudesEntrantes,
            'historialServicios' => $historialServicios,
            'serviciosActivos' => $serviciosActivos,
            'clientes' => $clientes
        ]);
    }
    public function rechazarServicio($id)
    {
        // Buscar el servicio por su ID
        $servicio = Transporte::find($id);

        // Verificar si el servicio existe
        if (!$servicio) {
            return redirect()->back()->with('error', 'El servicio no existe');
        }

        // Eliminar el servicio de la base de datos
        $servicio->delete();

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'El servicio ha sido rechazado exitosamente');
    }

    public function aceptarServicio($id)
    {
        // Buscar el servicio por su ID
        $servicio = Transporte::find($id);

        // Verificar si el servicio existe
        if (!$servicio) {
            return redirect()->back()->with('error', 'El servicio no existe');
        }

        // Actualizar el estado del servicio a 'activo'
        $servicio->estado = 'activo';
        $servicio->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'El servicio ha sido aceptado exitosamente');
    }
    public function finalizarServicio($id)
{
    // Buscar el servicio por su ID
    $servicio = Transporte::find($id);

    // Verificar si el servicio existe
    if (!$servicio) {
        return redirect()->back()->with('error', 'El servicio no existe');
    }

    // Actualizar el estado del servicio a 'finalizado'
    $servicio->estado = 'finalizado';
    $servicio->save();

    // Redireccionar con un mensaje de éxito
    return redirect()->back()->with('success', 'El servicio ha sido finalizado exitosamente');
}
}
