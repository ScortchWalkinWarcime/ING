<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CalificacionController;

Route::get('/Itesa', function () {
    return view('welcome');
})-> middleware('guest');

Route::get('/calificaciones', function () {
    return view('CalificacionesP');
})-> middleware('guest');

Route::get('/MenuMaestro', function () {
    return view('MenuMaestros');
})-> middleware('auth');

Route::get('/Menu', function ()  {
    return view('Menu');
})-> middleware('auth');

Route::get('/MenuJefe', function () {
    return view('MenuJefesDeDivision');
})-> middleware('auth');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/login', [LoginController::class, 'show']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/admin', function () {
    return view('Admin');
});

Route::get('/password/recover', function () {
    return view('password.recover'); // This view should contain the password recovery form
});

Route::get('/Itesa', function () {
    return view('welcome'); // Vista del login
})->name('login');


Route::get('/calificaciones/{tipo}', [CalificacionController::class, 'obtenerCalificaciones']);

use Illuminate\Http\Request;
use App\Models\Calificacion;

Route::get('/calificaciones/{tipo}', function (Request $request, $tipo) {
    $usuario_id = auth()->id(); // Obtener el usuario autenticado
    $calificaciones = Calificacion::where('usuario_id', $usuario_id)
                                  ->where('tipo', $tipo)
                                  ->get();
    return response()->json($calificaciones);
});