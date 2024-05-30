<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class LoginController extends Controller
{
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
            $user = Auth::user();

            if ($user->role==='admin') {
                return redirect('/AdminMain')->with('success', '¡Has iniciado sesión correctamente como administrador!');
            } elseif ($user->role==='cliente') {
                return redirect('/');
            } elseif ($user->role==='driver') {
                return redirect('/Conductores');
            }


            // O cualquier otro rol adicional que necesites manejar
        }

        // Si las credenciales no son válidas, redirige de nuevo al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->with('error', 'Credenciales incorrectas');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario

        $request->session()->invalidate(); // Invalida la sesión actual

        $request->session()->regenerateToken(); // Regenera el token de sesión

        return redirect('/'); // Redirige a la página de inicio u otra página según tu aplicación
    }

    public function update(Request $request)
    {
        $cliente = Cliente::find(Auth::id());

        // Actualizar el modelo del cliente con los datos proporcionados
        $cliente->update($request->only(['nombre', 'email', 'telefono', 'documento', 'fechaNac', 'genero']));

        return redirect()->back()->with('success', 'Información actualizada exitosamente');
        // Eliminar campos vacíos del array de datos del formulario
    }
}
