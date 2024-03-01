<?php

namespace App\Repository;
use App\Models\BaseRecipe;
use App\Models\Recipe;
use App\Repository\Contract\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentBaseRecipeRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return BaseRecipe::all();
    }

    public function getAllWith(array $with, string $order = 'id', string $by = 'asc'): Collection
    {
        return BaseRecipe::with($with)->orderBy($order,$by)->get();
    }
    
    public function getById(int $id): ?BaseRecipe
    {
        return BaseRecipe::find($id);
    }
    public function create(array $data): BaseRecipe
    {
        return BaseRecipe::create($data);   
    }
    public function update(int $id, array $data): ?BaseRecipe
    {
        $model = BaseRecipe::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = BaseRecipe::find($id);
        $model->delete();
        return true;
    }
}