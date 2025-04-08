<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones'; // Nombre de la tabla
    protected $fillable = ['usuario_id', 'materia', 'calificacion', 'tipo'];
}
