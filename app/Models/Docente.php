<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Docente extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

 protected $table = 'docentes'; // Asegúrate de que el nombre de la tabla sea correcto

 /**
 * The primary key associated with the table.
 *
 * @var string
 */
 protected $primaryKey = 'clave';

 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
 protected $fillable = [
 'clave',
 'nombre',
 'paterno',
 'matern',
 'sexo',
 'correo',
 'contrasena',
 'carrera',
 ];

 /**
 * The attributes that should be hidden for serialization.
 *
 * @var array
 */
 protected $hidden = [
 'contrasena',
 ];

 /**
 * The attributes that should be cast.
 *
 * @var array
 */
 protected $casts = [
    'contrasena' => 'hashed',
 ];

 /**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
 public function getAuthIdentifierName()
 {
 return 'clave';
 }

 /**
 * Get the password for the user.
 *
 * @return string
 */
 public function getAuthPassword()
 {
 return $this->contrasena;
 }

    /**
     * Validate the credentials for the user.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(array $credentials): bool
    {
        return $credentials['password'] === $this->contrasena;
    }
}
