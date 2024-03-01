<?php

namespace App\Repository;
use App\Models\RecipeProduct;
use App\Repository\Contract\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentRecipeProductRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return RecipeProduct::all();
    }
    public function getById(int $id): ?RecipeProduct
    {
        return RecipeProduct::find($id);
    }
    public function create(array $data): RecipeProduct
    {
        return RecipeProduct::create($data);   
    }
    public function update(int $id, array $data): ?RecipeProduct
    {
        $model = RecipeProduct::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = RecipeProduct::findOrFail($id);
        $model->delete();
        return true;
    }
}