<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'unit_price',
        'unit'
    ];

}
