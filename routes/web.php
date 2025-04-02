<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;

Route::get('/Itesa', function () {
    return view('welcome');
});


Route::get('/Menu', function () {
    return view('Menu');
});


Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/admin', function () {
    return view('Admin');
});

Route::get('/register', function () {
    return view('register'); // This view should contain the registration form
});

Route::get('/password/recover', function () {
    return view('password.recover'); // This view should contain the password recovery form
});

Route::get('/Itesa', function () {
    return view('welcome'); // Vista del login
})->name('login');

Route::post('/Itesa', [AuthController::class, 'login']); // Procesar el login

Route::get('/Menu', function () {
    return view('menu'); // Vista del menú después de iniciar sesión
})->name('menu');