<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthorBook
 *
 * @property $id_autor
 * @property $id_libro
 * @property $created_at
 * @property $updated_at
 *
 * @property Author $author
 * @property Book $book
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AuthorBook extends Model
{
    
    static $rules = [
		'id_autor' => 'required',
		'id_libro' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_autor','id_libro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne('App\Models\Author', 'id', 'id_autor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id', 'id_libro');
    }
    

}
