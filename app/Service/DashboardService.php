<?php

namespace App\Service;
use App\Repository\EloquentProductRepository;
use App\Repository\EloquentRecipeProductRepository;
use App\Repository\EloquentRecipeRepository;

class DashboardService {

    protected $eloquentRecipeRepository;
    public function __construct(EloquentRecipeRepository $eloquentRecipeRepository) 
    {
        $this->eloquentRecipeRepository = $eloquentRecipeRepository;
    }

    public function process()
    {
        return $this->eloquentRecipeRepository;
    }
   
}