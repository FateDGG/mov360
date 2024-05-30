<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Restaurante;
use Illuminate\Http\Request;


class EmpresaController extends Controller
{
    //
    public function index()
    {
        // Obtener todas las empresas desde la base de datos
        $empresas = Empresa::all();
        $restaurantes = Restaurante::all();

        // Pasar los datos de las empresas a la vista
        return view('AdminEmpresas')->with('empresas', $empresas)->with('restaurantes', $restaurantes);
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nit' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'legal_representative' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_email' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ]);

        // Crear una nueva instancia de Empresa con los datos proporcionados
        $empresa = new Empresa([
            'nit' => $request->nit,
            'fecha_creacion' => $request->creation_date,
            'representante_legal' => $request->legal_representative,
            'localizacion' => $request->location,
            'email' => $request->contact_email,
            'telefono' => $request->contact_phone,
            'nombre' => $request->company_name,
        ]);

        // Guardar la nueva empresa en la base de datos
        $empresa->save();

        // Redireccionar a una página de confirmación o a otra vista
        return redirect('/AdminEmp')->with('success', '¡Empresa creada correctamente!');
    }
    public function destroy($id)
    {
        // Encuentra la empresa por su ID
        $empresa = Empresa::findOrFail($id);

        // Elimina la empresa de la base de datos
        $empresa->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminEmp')->with('success', 'Empresa eliminada correctamente.');
    }
    public function destroyRestaurante($id)
    {
        // Encuentra la empresa por su ID
        $restaurante = Restaurante::findOrFail($id);

        // Elimina la empresa de la base de datos
        $restaurante->delete();

        // Redirige de regreso a la página de administrador o a donde lo necesites
        return redirect('/AdminEmp')->with('success', 'Restaurante eliminado correctamente.');
    }
    public function storeRestaurante(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|date',
            'telefono' => 'required|string|max:255',
            'tipo_cocina' => 'required|string|max:255',
            'tiempo_espera' => 'required|string|max:255',
            'url_foto' => 'required|string|max:255',
        ]);

        // Crear una nueva instancia de Empresa con los datos proporcionados
        $restaurante = new Restaurante([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'tipo_cocina' => $request->tipo_cocina,
            'tiempo_espera' => $request->tiemmpo_espera,
            'url_foto' => $request->url_foto,
        ]);

        // Guardar la nueva empresa en la base de datos
        $restaurante->save();

        // Redireccionar a una página de confirmación o a otra vista
        return redirect('/AdminEmp')->with('success', '¡Restaurante añadido correctamente!');
    }
}
