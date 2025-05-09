<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion; // Asegúrate de tener un modelo para las calificaciones

class CalificacionesController extends Controller
{
    public function obtenerCalificaciones($tipo)
    {
        // Obtén las calificaciones según el tipo (parcial o final)
        $calificaciones = Calificacion::where('tipo', $tipo)->get();

        // Devuelve las calificaciones como JSON
        return response()->json($calificaciones);
    }
}