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
});

Route::get('/DomPage', function () {
    return view ('components/domiciliosPage');
});

Route::get('/Alquilar_Vehiculo', function () {
    return view('alquilar');
})->middleware('RedirectIfNotAuthenticated');;

Route::get('/Solicitar_Transporte', function () {
    return view('transporte');
})->middleware('RedirectIfNotAuthenticated');;

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
})->middleware('RedirectIfNotAuthenticated');;
Route::get('/PagosTransporte', function () {
    return view('pagarTransporte');
})->middleware('RedirectIfNotAuthenticated');;

Route::get('/PagosAlquilado', function () {
    return view('pagarAlquilado');
})->middleware('RedirectIfNotAuthenticated');;
Route::get('/AñadirTarjeta', function () {
    return view('añadirTarjeta');
})->middleware('RedirectIfNotAuthenticated');;
Route::get('/carros', function () {
    return view('carro');
},);
Route::get('/RegistroDeConductor', function () {
    return view('registrarConductor');
});
Route::get('/RegistroDeEmpresa', function () {
    return view('registrarEmpresa');
});

Route::get('/AdminConduc', function () {
    return view('AdminConductores');
})->middleware('AdminLocked');
Route::get('/AdminPedidos', function () {
    return view('AdminUsers');
})->middleware('AdminLocked');

Route::get('/PostulacionesEmpresas', function () {
    return view('postulacionesEmpresas');
})->middleware('AdminLocked');
Route::get('/CrearEmpresa', function () {
    return view('AdmnCrearEmpresa');
})->middleware('AdminLocked');
Route::get('/Ubicacion', function () {
    return view('ubicacion');
});
Route::get('/AgregarConductor', function () {
    return view('admnCrearConductor');
})->middleware('AdminLocked');
Route::get('/PostulacionesConductores', function () {
    return view('postulacionesConductores');
})->middleware('AdminLocked');
Route::get('/Profile', function () {
    return view('perfil');
})->middleware('RedirectIfNotAuthenticated');;
Route::get('/Secciones', function () {
    return view('secciones');
})->middleware('RedirectIfNotAuthenticated');;

// Route::get('/Restaurante', function () {
//     return view('restaurante');
// })->middleware('NotAuthenticated');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register.post');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/Domicilios', 'App\Http\Controllers\RestaurantesController@showRestaurants')->name('restaurantes')->middleware('RedirectIfNotAuthenticated');;
Route::get('/Secciones', 'App\Http\Controllers\RestaurantesController@mostrarPorCategoria')->name('catrestaurantes')->middleware('RedirectIfNotAuthenticated');

Route::post('/Profile', 'App\Http\Controllers\Auth\LoginController@update')->name('user.update');

Route::get('/Alquilar_Vehiculo', 'App\Http\Controllers\AeropuertosController@showAeropuertos')->name('aeropuertos')->middleware('RedirectIfNotAuthenticated');;

Route::post('/procesarFormulario', 'App\Http\Controllers\AlquilerController@procesarFormulario')->name('procesarFormulario');

Route::post('/AñadirTarjeta', 'App\Http\Controllers\TarjetaController@guardarTarjeta')->name('añadirTarjeta');

Route::get('/añadir', function () {
    return view('components.tarjeta');
})->middleware('RedirectIfNotAuthenticated');

Route::post('/añadir', 'App\Http\Controllers\TarjetaController@guardarTarjeta')->name('añadir');

Route::get('/Profile', 'App\Http\Controllers\TarjetaController@mostrarTarjetas')->name('mostrarTarjetas')->middleware('RedirectIfNotAuthenticated');;

Route::delete('/Profile', 'App\Http\Controllers\TarjetaController@eliminarTarjeta')->name('tarjetas.eliminar');

Route::post('/guardar-alquiler', 'App\Http\Controllers\AlquilerController@guardarAlquiler')->name('guardar-alquiler');

// Route::get('/mostrarAlquileres', 'App\Http\Controllers\AlquilerController@mostrarAlquileres')->name('mostrarAlquileres');

Route::get('/Solicitar_Transporte', 'App\Http\Controllers\TransporteController@showFormulario')->name('transporte')->middleware('RedirectIfNotAuthenticated');;
Route::post('/Solicitar_Transporte', 'App\Http\Controllers\TransporteController@solicitarTransporte')->name('solicitar_transporte');

use App\Http\Controllers\RestauranteController;

Route::get('/Restaurante', 'App\Http\Controllers\RestaurantesController@show')->name('restaurante.show')->middleware('RedirectIfNotAuthenticated');

Route::get('/Carrito', 'App\Http\Controllers\CompraController@mostrarCarrito')->name('carrito.mostrar');
Route::post('/Carrito/agregar', 'App\Http\Controllers\CompraController@agregarElementoCarrito')->name('carrito.agregar');
Route::post('/Pagos', 'App\Http\Controllers\CompraController@realizarPago')->name('compra.pagar');
Route::delete('/Carrito/{key}', 'App\Http\Controllers\CompraController@eliminarProducto')->name('carrito.eliminar');
Route::post('/pagar', 'App\Http\Controllers\CompraController@pagar')->name('pagar');

Route::get('/CancelarAlquiler', 'App\Http\Controllers\AlquilerController@mostrarFormulariocancelacion')->name('mostrarFormularioCancelacion');

Route::post('/cancelarAlquiler', 'App\Http\Controllers\AlquilerController@cancelar')->name('cancelarAlquiler');


Route::get('/CancelarTransporte', 'App\Http\Controllers\TransporteController@formularioCancelacionTransporte')->name('formularioCancelacionTransporte');

Route::post('/cancelarTransporte', 'App\Http\Controllers\TransporteController@cancelarViaje')->name('cancelarViaje');

Route::get('/CancelarPedido', 'App\Http\Controllers\CompraController@formularioCancelacionPedido')->name('formularioCancelacionPedido');

Route::post('/cancelarPedido', 'App\Http\Controllers\CompraController@cancelarPedido')->name('cancelarPedido');

Route::get('/AdminEmp', 'App\Http\Controllers\EmpresaController@index')->middleware('AdminLocked');

Route::post('/crear_empresa', 'App\Http\Controllers\EmpresaController@store')->name('crear_empresa')->middleware('AdminLocked');

// routes/web.php

Route::delete('/empresas/{id}', 'App\Http\Controllers\EmpresaController@destroy')->name('eliminar_empresa')->middleware('AdminLocked');

Route::get('/AdminConduc', 'App\Http\Controllers\ConductorController@index')->middleware('AdminLocked');

Route::post('/agregar_conductor', 'App\Http\Controllers\ConductorController@store')->name('conductor.store')->middleware('AdminLocked');

Route::delete('/conductor/{id}', 'App\Http\Controllers\ConductorController@destroy')->name('eliminar_conductor')->middleware('AdminLocked');

Route::get('/AdminPedidos', 'App\Http\Controllers\ServiciosController@index')->middleware('AdminLocked');

Route::delete('/pedidos/{id}', 'App\Http\Controllers\ServiciosController@destroyCompra')->name('cancelar_compra')->middleware('AdminLocked');
Route::delete('/alquileres/{id}', 'App\Http\Controllers\ServiciosController@destroyAlquiler')->name('cancelar_alquiler')->middleware('AdminLocked');
Route::delete('/viajes/{id}', 'App\Http\Controllers\ServiciosController@destroyTransporte')->name('cancelar_viaje')->middleware('AdminLocked');

Route::get('/Conductores', 'App\Http\Controllers\ConductorController@mostrarPanelConductor');

Route::delete('/servicios/rechazar/{id}', 'App\Http\Controllers\ConductorController@rechazarServicio')->name('rechazar_servicio');
Route::post('/servicios/aceptar/{id}', 'App\Http\Controllers\ConductorController@aceptarServicio')->name('aceptar_servicio');
Route::post('/servicios/finalizar/{id}', 'App\Http\Controllers\ConductorController@finalizarServicio')->name('finalizar_servicio');
