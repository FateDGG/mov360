<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Plato;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function pagar(Request $request)
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Obtener los datos del formulario
        $total = $request->total;
        $productos = $request->productos;
        $metodoPago = $request->paymentMethod;

        // Crear una nueva compra
        $compra = new Compra();
        $compra->id_usuario = $usuario->id;
        $compra->valor = $total;

        // Construir la descripción de la compra
        $descripcion = '';
        foreach ($productos as $producto) {
            $descripcion .= $producto['nombre'] . ' (Cantidad: ' . $producto['cantidad'] . ', Precio: $' . $producto['precio'] . '), ';
        }
        $compra->descripcion = rtrim($descripcion, ', '); // Eliminar la última coma y espacio

        // Guardar la compra en la base de datos
        $compra->save();

        Session::forget('carrito');
        // Aquí puedes procesar los datos adicionales o redirigir a otra página, etc.
        return redirect('/')->with('success_message', '¡Pago aprobado! Tu pedido ha sido realizado con éxito');
        // Por ejemplo, redirige a una página de pago exitoso
    }
    public function formularioCancelacionPedido(Request $request)
    {
        $id = $request->input('id');

        // Obtener la compra por ID
        $compra = Compra::find($id);

        if (!$compra) {
            return redirect('/')->with('error_message', '¡Compra no encontrada!');
        }

        // Pasar la compra a la vista de cancelación
        return view('cancelarPedido', compact('compra'));
    }
    public function cancelarPedido(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'cancelReason' => 'required|string|max:255',
        ]);

        // Obtener el alquiler y eliminarlo
        $compra = Compra::find($request->compra_id);
        
        if ($compra) {
            // Puedes registrar la razón de la cancelación en un registro separado si es necesario
            $razon = $request->cancelReason;

            // Eliminar el alquiler
            $compra->delete();
            
            // Redirigir con un mensaje de éxito
            return redirect('/Profile')->with('success_message', '¡Compra cancelada con éxito!');
        }

        // Redirigir con un mensaje de error si no se encuentra el alquiler
        return redirect('/Profile')->with('error_message', '¡Compra no encontrada!');
    }
}
