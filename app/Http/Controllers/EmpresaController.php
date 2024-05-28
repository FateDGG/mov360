<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Empresas;
use Illuminate\Http\Request;


class EmpresaController extends Controller
{
    //
    public function index()
    {
        // Obtener todas las empresas desde la base de datos
        $empresas = Empresa::all();

        // Pasar los datos de las empresas a la vista
        return view('AdminEmpresas')->with('empresas', $empresas);
    }
}
