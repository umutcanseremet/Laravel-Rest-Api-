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
        $data = Product::findorfail($id);
        return $data;
    }

    public function store( ProductPostRequest  $request)
    {

        $validated = $request->validated();
        $result=$product = Product::create($validated);
        $message=$result?:'Ürün Kaydedilemedi';
        return response()->json(['message'=>$message],200);
    }

    public function update(ProductPostRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::findorfail($id);

        $result= $product->update($data);
        $message=$result?:'Güncellenemedi';
        return response()->json(['message'=>$message], 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
       $result= $product->delete();
        $message=$result?:'Silinemedi';
        return response()->json(['message'=>$message], 200);
     }
    }
