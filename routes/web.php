<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantesController;
use App\Http\Controllers\UserController;

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
    return view('Pagar');
});
Route::get('/AñadirTarjeta', function () {
    return view('añadirTarjeta');
});
Route::get('/carros', function () {
    return view('carro');
});
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
Route::get('/AdminUser', function () {
    return view('AdminUsers');
});
Route::get('/Profile', function () {
    return view('perfil');
})->middleware('NotAuthenticated');
Route::get('/Secciones', function () {
    return view('secciones');
})->middleware('NotAuthenticated');
Route::get('/Restaurante', function () {
    return view('restaurante');
})->middleware('NotAuthenticated');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register.post');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/Domicilios', 'App\Http\Controllers\RestaurantesController@showRestaurants')->name('restaurantes')->middleware('NotAuthenticated');
Route::get('/Secciones', 'App\Http\Controllers\RestaurantesController@mostrarPorCategoria')->name('catrestaurantes');

Route::post('/Profile', 'App\Http\Controllers\Auth\LoginController@update')->name('user.update');

