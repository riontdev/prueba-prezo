<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class RecipeBaseRecipe extends Model
{
    protected $table = 'recipe_base_recipes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'total',
    ];

}
