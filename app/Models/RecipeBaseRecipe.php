<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class RecipeBaseRecipe extends Model
{
    protected $table = 'recipe_base_recipes';
    protected $hidden = ['recipe_id', 'recipe_base_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipe_id',
        'recipe_base_id',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
