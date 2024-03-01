<?php

namespace App\Service;
use App\Repository\EloquentProductRepository;
use App\Repository\EloquentRecipeBaseProductRepository;
use App\Repository\EloquentRecipeBaseRecipeRepository;
use App\Repository\EloquentRecipeRepository;

class MakeListRecipeService {

    protected $eloquentRecipeRepository;
    protected $eloquentProductRepository;
    protected $eloquentRecipeBaseProductRepository;
    protected $eloquentRecipeBaseRecipeRepository;
    
    
    public function __construct(
    EloquentRecipeRepository $eloquentRecipeRepository, 
    EloquentProductRepository $eloquentProductRepository, 
    EloquentRecipeBaseProductRepository $eloquentRecipeBaseProductRepository,
    EloquentRecipeBaseRecipeRepository $eloquentRecipeBaseRecipeRepository
    ) {
        $this->eloquentRecipeRepository = $eloquentRecipeRepository;
        $this->eloquentProductRepository = $eloquentProductRepository;
        $this->eloquentRecipeBaseProductRepository = $eloquentRecipeBaseProductRepository;
        $this->eloquentRecipeBaseRecipeRepository = $eloquentRecipeBaseRecipeRepository;
    }

    public function process(array $products, array $recipes, int $base_recipe_id): float
    {
        $total = 0;
        foreach($products as $product) {
            $product_model = $this->eloquentProductRepository->getById($product['product_id']);
            $product['recipe_base_id'] = $base_recipe_id;
            $this->eloquentRecipeBaseProductRepository->create($product);
            $total+= $product['gross_quantity'] * $product_model->unit_price;
        }

        $recipes = $this->eloquentRecipeRepository->findMany($recipes);
        foreach($recipes as $recipe) {
            $this->eloquentRecipeBaseRecipeRepository->create(
                [
                    'recipe_id' => $recipe->id,
                    'recipe_base_id' => $base_recipe_id
                ]
            );
           
            $total+= $recipe->total;
        }

        return $total;
    }
   
}