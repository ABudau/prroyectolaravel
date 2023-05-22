<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookCategory
 *
 * @property $id
 * @property $book_id
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Book $book
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookCategory extends Model
{
    
    static $rules = [
		'book_id' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['book_id','category_id'];
    protected $table = 'book_category';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function book()
    // {
    //     return $this->hasOne('App\Models\Book', 'id', 'book_id');
    // }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function category()
    // {
    //     return $this->hasOne('App\Models\Category', 'id', 'category_id');
    // }
    

}
