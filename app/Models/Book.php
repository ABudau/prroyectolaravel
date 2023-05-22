<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $ISBN
 * @property $titulo
 * @property $editorial
 * @property $numero_paginas
 * @property $portada
 * @property $created_at
 * @property $updated_at
 *
 * @property AuthorBook[] $authorBooks
 * @property BookCategory[] $bookCategories
 * @property BookUser[] $bookUsers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    
    static $rules = [
		'ISBN' => 'required',
		'titulo' => 'required',
		'editorial' => 'required',
		'numero_paginas' => 'required',
		'portada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ISBN','titulo','editorial','numero_paginas','portada'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected $primaryKey = 'id';


    public function authors()
    {
     return $this->belongsToMany(Author::class, 'author_book', 'id_libro', 'id_autor');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

}
