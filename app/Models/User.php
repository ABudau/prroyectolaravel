<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $direccion
 * @property $ciudad
 * @property $provincia
 * @property $codigo_postal
 * @property $telefono
 * @property $username
 * @property $email
 * @property $fecha_nacimiento
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property BookUser $bookUser
 * @property RolUser $rolUser
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'direccion',
        'ciudad',
        'provincia',
        'codigo_postal',
        'telefono',
        'username',
        'email',
        'fecha_nacimiento',
        'password',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookUser()
    {
        return $this->hasOne('App\Models\BookUser', 'id_usuario', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rolUser()
    {
        return $this->hasOne('App\Models\RolUser', 'id_usuario', 'id');
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

}
