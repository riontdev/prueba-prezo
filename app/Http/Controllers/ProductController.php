<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $service;
    public function __construct(ProductService $service) 
    {
        $this->service = $service;
    }
    public function index(Request $request) 
    {
        $products = $this->service->getAll();

        return response()->json([
            "data" => $products
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $product = $this->service->create([
            "name" => $request->name,
            "unit_price" => $request->unit_price,
            "unit" => $request->unit
        ]);

        return response()->json([
            "success" => true,
            "data" => $product
        ]);
    }

    public function show(Product $product) 
    {
        return response()->json([
            "data" => $product
        ]);
    }

    public function update(Product $product, Request $request) 
    {
        $product = $this->service->update($product->id,$request->all());
        return response()->json([
            "data" => $product
        ]);
    }

    public function destroy(Product $product) 
    {
        $product = $this->service->remove($product->id);
        return response()->json([
            "data" => $product
        ]);
    }
}
