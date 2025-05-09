<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    
    protected $table = 'calificaciones';
    protected $fillable = ['usuario_id', 'materia', 'calificacion', 'tipo'];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\user::class, 'usuario_id');
    }
}