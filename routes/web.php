<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Domicilios', function () {
    return view('domicilios');
});

Route::get('/Alquilar_Vehiculo', function () {
    return view('alquilar');
});

Route::get('/Solicitar_Transporte', function () {
    return view('transporte');
});

Route::get('/Ingreso', function () {
    return view('ingreso');
});

Route::get('/LogIn', function () {
    return view('login');
});

Route::get('/Register', function () {
    return view('registro');
});

Route::get('/Profile', function () {
    return view('perfil');
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register.post');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');