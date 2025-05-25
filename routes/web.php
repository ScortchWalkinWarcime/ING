<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index']);

Route::get('/Menu', function () {
    return view('Menu');
})->middleware('auth');

Route::get('/MenuMaestros', function () {
    return view('MenuMaestros');
})->middleware('auth');

Route::get('/MenuJefesDivision', function () {
    return view('MenuJefesDivision');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);