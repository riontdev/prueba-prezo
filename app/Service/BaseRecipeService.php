<?php

namespace App\Service;
use App\Repository\EloquentBaseRecipeRepository;
use App\Repository\EloquentRecipeRepository;

class BaseRecipeService {

    protected $eloquentBaseRecipeRepository;
    public function __construct(EloquentBaseRecipeRepository $eloquentBaseRecipeRepository)
    {
        $this->eloquentBaseRecipeRepository = $eloquentBaseRecipeRepository;
    }

    public function getAll(array $with = [], string $order = 'id', string $by = 'asc')
    {
        $data = [];
        if (count($with) > 0) {
            $data = $this->eloquentBaseRecipeRepository->getAllWith($with, $order, $by);
        } else {
            $data =  $this->eloquentBaseRecipeRepository->getAll();
        }

        return $data;
    }

    public function get(int $id)
    {
        return $this->eloquentBaseRecipeRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->eloquentBaseRecipeRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->eloquentBaseRecipeRepository->update($id, $data);
    }

    public function remove(int $id)
    {
        return $this->eloquentBaseRecipeRepository->delete($id);
    }
   
}