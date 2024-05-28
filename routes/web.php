<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlquilerController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Domicilios', function () {
    return view('domicilios');
})->middleware('NotAuthenticated');

Route::get('/DomPage', function () {
    return view ('components/domiciliosPage');
});

Route::get('/Alquilar_Vehiculo', function () {
    return view('alquilar');
})->middleware('NotAuthenticated');

Route::get('/Solicitar_Transporte', function () {
    return view('transporte');
})->middleware('NotAuthenticated');

Route::get('/Ingreso', function () {
    return view('ingreso');
});

Route::get('/LogIn', function () {
    return view('login');
});

Route::get('/Register', function () {
    return view('registro');
});
Route::get('/Carrito', function () {
    return view('shopcart');
});
Route::get('/Pagos', function () {
    return view('pagar');
});
Route::get('/PagosTransporte', function () {
    return view('pagarTransporte');
});

Route::get('/PagosAlquilado', function () {
    return view('pagarAlquilado');
});
Route::get('/AñadirTarjeta', function () {
    return view('añadirTarjeta');
});
Route::get('/carros', function () {
    return view('carro');
},);
Route::get('/RegistroDeConductor', function () {
    return view('registrarConductor');
});
Route::get('/RegistroDeEmpresa', function () {
    return view('registrarEmpresa');
});
Route::get('/AdminEmp', function () {
    return view('AdminEmpresas');
});
Route::get('/AdminConduc', function () {
    return view('AdminConductores');
});
Route::get('/AdminPedidos', function () {
    return view('AdminUsers');
});

Route::get('/PostulacionesEmpresas', function () {
    return view('postulacionesEmpresas');
});
Route::get('/CrearEmpresa', function () {
    return view('AdmnCrearEmpresa');
});
Route::get('/AgregarConductor', function () {
    return view('admnCrearConductor');
});
Route::get('/PostulacionesConductores', function () {
    return view('postulacionesConductores');
});
Route::get('/Profile', function () {
    return view('perfil');
})->middleware('NotAuthenticated');
Route::get('/Secciones', function () {
    return view('secciones');
})->middleware('NotAuthenticated');

// Route::get('/Restaurante', function () {
//     return view('restaurante');
// })->middleware('NotAuthenticated');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register.post');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/Domicilios', 'App\Http\Controllers\RestaurantesController@showRestaurants')->name('restaurantes')->middleware('NotAuthenticated');
Route::get('/Secciones', 'App\Http\Controllers\RestaurantesController@mostrarPorCategoria')->name('catrestaurantes');

Route::post('/Profile', 'App\Http\Controllers\Auth\LoginController@update')->name('user.update');

Route::get('/Alquilar_Vehiculo', 'App\Http\Controllers\AeropuertosController@showAeropuertos')->name('aeropuertos');

Route::post('/procesarFormulario', 'App\Http\Controllers\AlquilerController@procesarFormulario')->name('procesarFormulario');

Route::post('/AñadirTarjeta', 'App\Http\Controllers\TarjetaController@guardarTarjeta')->name('añadirTarjeta');

Route::get('/añadir', function () {
    return view('components.tarjeta');
})->middleware('NotAuthenticated');

Route::post('/añadir', 'App\Http\Controllers\TarjetaController@guardarTarjeta')->name('añadir');

Route::get('/Profile', 'App\Http\Controllers\TarjetaController@mostrarTarjetas')->name('mostrarTarjetas');

Route::delete('/Profile', 'App\Http\Controllers\TarjetaController@eliminarTarjeta')->name('tarjetas.eliminar');

Route::post('/guardar-alquiler', 'App\Http\Controllers\AlquilerController@guardarAlquiler')->name('guardar-alquiler');

// Route::get('/mostrarAlquileres', 'App\Http\Controllers\AlquilerController@mostrarAlquileres')->name('mostrarAlquileres');

Route::get('/Solicitar_Transporte', 'App\Http\Controllers\TransporteController@showFormulario')->name('transporte');
Route::post('/Solicitar_Transporte', 'App\Http\Controllers\TransporteController@solicitarTransporte')->name('solicitar_transporte');

use App\Http\Controllers\RestauranteController;

Route::get('/Restaurante', 'App\Http\Controllers\RestaurantesController@show')->name('restaurante.show')->middleware('NotAuthenticated');

Route::get('/Carrito', 'App\Http\Controllers\CompraController@mostrarCarrito')->name('carrito.mostrar');
Route::post('/Carrito/agregar', 'App\Http\Controllers\CompraController@agregarElementoCarrito')->name('carrito.agregar');
Route::post('/Pagos', 'App\Http\Controllers\CompraController@realizarPago')->name('compra.pagar');
Route::delete('/Carrito/{key}', 'App\Http\Controllers\CompraController@eliminarProducto')->name('carrito.eliminar');
Route::post('/pagar', 'App\Http\Controllers\CompraController@pagar')->name('pagar');

Route::get('/CancelarAlquiler', 'App\Http\Controllers\AlquilerController@mostrarFormulariocancelacion')->name('mostrarFormularioCancelacion');

Route::post('/cancelarAlquiler', 'App\Http\Controllers\AlquilerController@cancelar')->name('cancelarAlquiler');


Route::get('/CancelarTransporte', 'App\Http\Controllers\TransporteController@formularioCancelacionTransporte')->name('formularioCancelacionTransporte');

Route::post('/cancelarTransporte', 'App\Http\Controllers\TransporteController@cancelarViaje')->name('cancelarViaje');