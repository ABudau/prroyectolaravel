<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookUser
 *
 * @property $id_usuario
 * @property $id_libro
 * @property $puntuacion
 * @property $comentario
 * @property $fecha
 * @property $descuento
 * @property $created_at
 * @property $updated_at
 *
 * @property Book $book
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookUser extends Model
{
    
    static $rules = [
		'id_usuario' => 'required',
		'id_libro' => 'required',
		'puntuacion' => 'required',
		'comentario' => 'required',
		'fecha' => 'required',
		'descuento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario','id_libro','puntuacion','comentario','fecha','descuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id', 'id_libro');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}
