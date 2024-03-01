<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeProduct;
use App\Service\MakeListProductService;
use App\Service\RecipeService;
use Illuminate\Http\Request;
use DB;

class RecipeController extends Controller
{
    protected $recipeService;
    protected $makeListProductService;

    public function __construct(RecipeService $recipeService, MakeListProductService $makeListProductService)
    {
        $this->recipeService = $recipeService;
        $this->makeListProductService = $makeListProductService;
    }
    
    public function index(Request $request) 
    {
        $recipe = $this->recipeService
        ->getAll(['recipeProducts.product']);

        return response()->json([
            "data" => $recipe
        ]);
    }

    public function store(Request $request) 
    {
        $recipe = $this->recipeService->create([
            "name" => $request->name,
        ]);

        $total = $this->makeListProductService->process($request->products, $recipe->id);
        $this->recipeService->update($recipe->id, ['total' => $total]);

        return response()->json([
            "data" => $recipe
        ]);
    }

    public function show(Recipe $recipe) 
    {
        return response()->json([
            "data" => $recipe
        ]);
    }

    public function destroy(Recipe $recipe) 
    {
        // remove with other service
        $recipe->recipeProducts()->delete();
        $this->recipeService->remove($recipe->id);

        return response()->json([
            "data" => $recipe
        ]);
    }

    public function getMore()
    {
        $data = $this->recipeService->getMore();
        return response()->json($data);
    }
}
