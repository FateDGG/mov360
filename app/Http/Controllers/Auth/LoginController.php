<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intenta autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si las credenciales son válidas, el usuario está autenticado
            return redirect('/')->with('success', '¡Has iniciado sesión correctamente!');
        }

        // Si las credenciales no son válidas, redirige de nuevo al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->with('error', 'Credenciales incorrectas');

    }

}
