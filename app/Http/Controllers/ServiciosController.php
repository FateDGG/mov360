<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Transporte;
use App\Models\Alquiler;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    //
    public function index()
    {
        // Obtener todas las empresas desde la base de datos
        $compras = Compra::all();
        $alquileres = Alquiler::all();
        $transportes = Transporte::all();
        $clientes = Cliente::all();

        // Pasar los datos de las empresas a la vista
        return view('AdminUsers')->with('compras', $compras)->with('alquileres', $alquileres)->with('transportes', $transportes)->with('clientes', $clientes);
    }
    public function destroyCompra($id)
    {
        // Encuentra la empresa por su ID
        $compra = Compra::findOrFail($id);

        // Elimina la empresa de la base de datos
        $compra->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminPedidos')->with('success', 'Compra cancelada correctamente.');
    }
    public function destroyTransporte($id)
    {
        // Encuentra la empresa por su ID
        $transporte = Transporte::findOrFail($id);

        // Elimina la empresa de la base de datos
        $transporte->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminPedidos')->with('success', 'Viaje Cancelado correctamente.');
    }
    public function destroyAlquiler($id)
    {
        // Encuentra la empresa por su ID
        $alquiler = Alquiler::findOrFail($id);

        // Elimina la empresa de la base de datos
        $alquiler->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminPedidos')->with('success', 'Alquiler Cancelado correctamente.');
    }
}
