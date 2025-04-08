<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificaciones;

class CalificacionesController extends Controller
{
    public function obtenerCalificaciones($tipo)
    {
        $calificaciones = Calificaciones::where('tipo', $tipo)->get();
        return response()->json($calificaciones);
    }
}