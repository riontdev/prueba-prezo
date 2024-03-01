<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class RecipeBaseProduct extends Model
{

    protected $table = 'recipe_base_products';
    protected $hidden = ['product_id', 'recipe_base_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'recipe_base_id',
        'gross_quantity',
        'net_quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
