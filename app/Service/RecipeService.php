<?php

namespace App\Service;
use App\Repository\EloquentRecipeRepository;

class RecipeService {

    protected $eloquentRecipeRepository;
    public function __construct(EloquentRecipeRepository $eloquentRecipeRepository)
    {
        $this->eloquentRecipeRepository = $eloquentRecipeRepository;
    }

    public function getAll(array $with = [], string $order = 'id', string $by = 'asc') {
        $data = [];
        if (count($with) > 0) {
            $data = $this->eloquentRecipeRepository->getAllWith($with, $order, $by);
        } else {
            $data =  $this->eloquentRecipeRepository->getAll();
        }

        return $data;
    }

    public function get(int $id)
    {
        return $this->eloquentRecipeRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->eloquentRecipeRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->eloquentRecipeRepository->update($id, $data);
    }

    public function remove(int $id)
    {
        return $this->eloquentRecipeRepository->delete($id);
    }

    public function getMore()
    {
        return $this->eloquentRecipeRepository->getMoreUsed();
    }
   
}