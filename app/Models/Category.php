<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $Nombre
 * @property $id_subcategoria
 * @property $created_at
 * @property $updated_at
 *
 * @property BookCategory[] $bookCategories
 * @property Category[] $categories
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    use HasFactory;
    static $rules = [
		'Nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','id_subcategoria'];

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'id_subcategoria');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function bookCategories()
    // {
    //     return $this->hasMany('App\Models\BookCategory', 'category_id', 'id');
    // }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function categories()
    // {
    //     return $this->hasMany('App\Models\Category', 'id_subcategoria', 'id');
    // }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function category()
    // {
    //     return $this->hasOne('App\Models\Category', 'id', 'id_subcategoria');
    // }
    

}
