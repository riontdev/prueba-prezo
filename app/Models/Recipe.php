<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Recipe extends Model
{
    protected $table = 'recipes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'total'
    ];

    public function recipeProducts()
    {
        return $this->hasMany(RecipeProduct::class);
    }

}
