<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       return Product::all();
    }

    public function show($id)
    {
        $data = Product::find($id);
        if (!$data) {
        return response()->json([
        'message' => 'Kayıt Bulunumadı !'
        ], 404);
        //deneme
        }

        {
            return $data;
        }
    }

    public function store( ProductPostRequest  $request)
    {

        $validated = $request->validated();
        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function update(ProductPostRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::find($id);
        if (!$product) {
        return response()->json([
        'message' => 'Kayıt Bulunamadı !'

        ], 404);
    }
        {
            $product->update($data);
            return response()->json($product, 200);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {

        return response()->json([
        'message' => 'Kayıt Bulunumadı !'
        ], 404);
        }

        {
        $product->delete();
        return response()->json([
        'message' => 'Kayıt Silindi!'
        ], 200);
        }
    }
}
