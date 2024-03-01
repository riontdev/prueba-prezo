<?php

namespace App\Service;
use App\Repository\EloquentProductRepository;

class ProductService {

    protected $eloquentRepository;
    public function __construct(EloquentProductRepository $eloquentRepository) {
        $this->eloquentRepository = $eloquentRepository;
    }

    public function getAll(array $with = []) 
    {
        $data =  $this->eloquentRepository->getAll();

        return $data;
    }

    public function get(int $id) 
    {
        return $this->eloquentRepository->getById($id);
    }

    public function create(array $data) 
    {
        return $this->eloquentRepository->create($data);
    }

    public function update(int $id, array $data) 
    {
        return $this->eloquentRepository->update($id, $data);
    }

    public function remove(int $id) 
    {
        return $this->eloquentRepository->delete($id);
    }
   
}