<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class BaseRecipe extends Model
{
    protected $table = 'base_recipes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'total',
    ];

    public function recipeBaseProducts()
    {
        return $this->hasMany(RecipeBaseProduct::class, 'recipe_base_id');
    }
    public function recipeBaseRecipes()
    {
        return $this->hasMany(RecipeBaseRecipe::class, 'recipe_base_id');
    }

}
