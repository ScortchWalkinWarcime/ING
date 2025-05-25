<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;

class Estudiante extends AuthenticatableModel implements Authenticatable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estudiantes'; // Assuming your table is named 'Estudiantes'

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'matricula'; // Assuming 'matricula' is your primary key

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false; // Assuming 'matricula' is not auto-incrementing

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string'; // Assuming 'matricula' is a string

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // Assuming your table does not have timestamps (created_at, updated_at)

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula',
        'nombre',
        'paterno',
        'materno',
        'semestre',
        'sexo',
        'carrera',
        'password', // Assuming you have a password column
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'password' => 'hashed', // Assuming you are hashing passwords
    ];

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifierName()
    {
        return 'matricula';
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    // If you need "remember me" functionality, you'll need these methods as well:
    // public function getRememberTokenName()
    // {
    //     return 'remember_token';
    // }

    // public function getRememberToken()
    // {
    //     return $this->remember_token;
    // }

    // public function setRememberToken($value)
    // {
    //     $this->remember_token = $value;
    // }
}