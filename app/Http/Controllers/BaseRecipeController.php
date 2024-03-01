<?php

namespace App\Http\Controllers;

use App\Models\BaseRecipe;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeBaseProduct;
use App\Models\RecipeBaseRecipe;
use App\Service\BaseRecipeService;
use App\Service\MakeListRecipeService;
use Illuminate\Http\Request;
use DB;

class BaseRecipeController extends Controller
{

    protected $baseRecipeService;
    protected $makeListRecipeService;

    public function __construct(BaseRecipeService $baseRecipeService, MakeListRecipeService $makeListRecipeService) 
    {
        $this->baseRecipeService = $baseRecipeService;
        $this->makeListRecipeService = $makeListRecipeService;
    }
    public function index(Request $request) 
    {
        $base_recipes = $this->baseRecipeService
        ->getAll(['recipeBaseProducts.product', 'recipeBaseRecipes.recipe.recipeProducts.product'], 'total', 'desc');

        return response()->json([
            "data" => $base_recipes
        ]);
    }

    public function indexOrderBy(Request $request) 
    {
        $base_recipes = $this->baseRecipeService
        ->getAll(['recipeBaseProducts.product', 'recipeBaseRecipes.recipe.recipeProducts.product']);

        return response()->json([
            "data" => $base_recipes
        ]);
    }

    public function store(Request $request) 
    {
        $base_recipe = $this->baseRecipeService->create([
            "name" => $request->name,
        ]);

        $total = $this->makeListRecipeService->process($request->products, $request->recipes, $base_recipe->id);
        $this->baseRecipeService->update($base_recipe->id, ['total' => $total]);

        return response()->json([
            "data" => $base_recipe
        ]);
    }

    public function show(BaseRecipe $base_recipe) 
    {
        return response()->json([
            "data" => $base_recipe
        ]);
    }

    public function update(BaseRecipe $base_recipe, Request $request) 
    {
        return response()->json([
            "data" => $base_recipe
        ]);
    }

    public function destroy(BaseRecipe $base_recipe) 
    {
        $base_recipe->delete();

        return response()->json([
            "data" => $base_recipe
        ]);
    }
}
