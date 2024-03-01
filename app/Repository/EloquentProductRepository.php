<?php

namespace App\Repository;
use App\Models\Product;
use App\Repository\Contract\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentProductRepository implements EloquentRepositoryInterface {

   
    public function getAll(): Collection
    {
        return Product::all();
    }
    public function getById(int $id): ?Product
    {
        return Product::find($id);
    }
    public function create(array $data): Product
    {
        return Product::create($data);   
    }
    public function update(int $id, array $data): ?Product
    {
        $model = Product::find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = Product::findOrFail($id);
        $model->delete();
        return true;
    }
}