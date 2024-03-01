<?php

namespace App\Repository;
use App\Models\Recipe;
use App\Repository\Contract\EloquentRepositoryInterface;
use DB;
use Illuminate\Database\Eloquent\Collection;

class EloquentRecipeRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return Recipe::all();
    }

    public function getAllWith(array $with, string $order = 'id', string $by = 'asc'): Collection
    {
        return Recipe::with($with)->orderBy($order, $by)->get();
    }

    public function findMany(array $ids): Collection
    {
        return Recipe::findMany($ids);
    }

    public function getById(int $id): ?Recipe
    {
        return Recipe::find($id);
    }
    public function create(array $data): Recipe
    {
        return Recipe::create($data);   
    }
    public function update(int $id, array $data): ?Recipe
    {
        $model = Recipe::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = Recipe::find($id);
        $model->delete();
        return true;
    }

    public function getMoreUsed()
    {
        $data = Recipe::query()
        ->select('recipes.*', DB::raw('(SELECT COUNT(id) from recipe_base_recipes where recipe_id = recipes.id) as count_recipes'))
        ->with('recipeProducts.product')
        ->orderBy(DB::raw('(SELECT COUNT(id) from recipe_base_recipes where recipe_id = recipes.id)'), 'desc')
        ->get();
        
        return [
            "data" => [
                "top" => $data->first(),
                "min" => $data->last()
            ]
        ];
    }
}