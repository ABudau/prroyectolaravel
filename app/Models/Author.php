<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $created_at
 * @property $updated_at
 *
 * @property AuthorBook $authorBook
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Author extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos'];
    public function books()
    {
     return $this->belongsToMany(Book::class, 'author_book', 'id_autor', 'id_libro');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function authorBook()
    // {
    //     return $this->hasOne('App\Models\AuthorBook', 'id_autor', 'id');
    // }
    

}
