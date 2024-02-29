<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class RecipeProduct extends Model
{
    protected $table = 'recipe_products';
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
