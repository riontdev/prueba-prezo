<?php

namespace App\Repository;
use App\Models\RecipeBaseProduct;
use App\Repository\Contract\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentRecipeBaseProductRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return RecipeBaseProduct::all();
    }
    public function getById(int $id): ?RecipeBaseProduct
    {
        return RecipeBaseProduct::find($id);
    }
    public function create(array $data): RecipeBaseProduct
    {
        return RecipeBaseProduct::create($data);   
    }
    public function update(int $id, array $data): ?RecipeBaseProduct
    {
        $model = RecipeBaseProduct::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = RecipeBaseProduct::findOrFail($id);
        $model->delete();
        return true;
    }
}