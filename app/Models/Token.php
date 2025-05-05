<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provider',
        'access_token',
        'refresh_token',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
    ];

    /**
     * Relación con el modelo User (cada token pertenece a un usuario).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}