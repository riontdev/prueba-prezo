<?php

namespace App\Repository;
use App\Models\RecipeBaseRecipe;
use App\Repository\Contract\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentRecipeBaseRecipeRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return RecipeBaseRecipe::all();
    }
    public function getById(int $id): ?RecipeBaseRecipe
    {
        return RecipeBaseRecipe::find($id);
    }
    public function create(array $data): RecipeBaseRecipe
    {
        return RecipeBaseRecipe::create($data);   
    }
    public function update(int $id, array $data): ?RecipeBaseRecipe
    {
        $model = RecipeBaseRecipe::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = RecipeBaseRecipe::findOrFail($id);
        $model->delete();
        return true;
    }
}