<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('functions.register');
    }

    public function register(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea un nuevo cliente
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->password = bcrypt($request->input('password'));
        $cliente->documento = null;
        $cliente->genero= null;
        $cliente->fechaNac= null;
        $cliente->save();

        // Redirige a la página de inicio o a donde desees
        return redirect('/LogIn');
    }
}
