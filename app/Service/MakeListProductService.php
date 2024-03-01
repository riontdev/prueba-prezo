<?php

namespace App\Service;
use App\Repository\EloquentProductRepository;
use App\Repository\EloquentRecipeProductRepository;
use App\Repository\EloquentRecipeRepository;

class MakeListProductService {

    protected $eloquentRecipeProductRepository;
    protected $eloquentProductRepository;
    public function __construct(EloquentRecipeProductRepository $eloquentRecipeProductRepository, EloquentProductRepository $eloquentProductRepository) 
    {
        $this->eloquentRecipeProductRepository = $eloquentRecipeProductRepository;
        $this->eloquentProductRepository = $eloquentProductRepository;
    }

    public function process(array $products, $recipe_id)
    {
        $total = 0;
        foreach($products as $product) {
            $product_model = $this->eloquentProductRepository->getById($product['product_id']);
            $product['recipe_id'] = $recipe_id;
            $this->eloquentRecipeProductRepository->create($product);
            $total+= $product['gross_quantity'] * $product_model->unit_price;
        }

        return $total;
    }
   
}