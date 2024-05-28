<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Plato;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    //
    public function mostrarCarrito()
    {
        // Obtener el carrito actual del usuario desde la sesión
        $carrito = session()->get('carrito', []);

        return view('shopcart', compact('carrito'));
    }

    public function agregarElementoCarrito(Request $request)
    {
        $plato = Plato::findOrFail($request->plato_id); 
    
        $carrito = session()->get('carrito');
        $total = session()->get('total', 0); // Obtener el valor total actual o 0 si no existe
    
        if(!$carrito || !isset($carrito[$plato->id])) {
            $carrito[$plato->id] = [
                'plato' => $plato,
                'cantidad' => $request->cantidad
            ];
    
            // Sumar el precio del producto al valor total
            $total += $plato->precio * $request->cantidad;
    
            session()->put('carrito', $carrito);
            session()->put('total', $total);
        } else {
            $total += ($plato->precio * $request->cantidad) - ($carrito[$plato->id]['plato']->precio * $carrito[$plato->id]['cantidad']);
            $carrito[$plato->id]['cantidad'] += $request->cantidad;
            session()->put('carrito', $carrito);
            session()->put('total', $total);
        }
    
        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }
    
    public function eliminarProducto($key)
    {
        $carrito = session('carrito');
        $total = session('total', 0); // Obtener el valor total actual o 0 si no existe
    
        if (isset($carrito[$key])) {
            // Restar el precio del producto eliminado del valor total
            $total -= $carrito[$key]['plato']->precio * $carrito[$key]['cantidad'];
    
            unset($carrito[$key]);
            session()->put('carrito', $carrito);
            
            // Verificar si el total es menor que cero y establecerlo en cero si es así
            if ($total < 0) {
                $total = 0;
            }
    
            session()->put('total', $total);
        }
    
        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }


    public function realizarPago(Request $request)
    {
        $usuario = Auth::user();
        // Obtener los datos del formulario
        $total = $request->total;
        $productos = $request->productos;
        $tarjetas = Tarjeta::where('id_usuario', $usuario->id)->get();
        // Aquí puedes procesar los datos como desees, por ejemplo, guardar en la base de datos
        // o pasarlos a la vista para mostrarlos

        // Por ejemplo, puedes pasar los datos a la vista de confirmación de pago
        return view('pagar', compact('total', 'productos', 'tarjetas'));
    }
}
