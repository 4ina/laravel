<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    
    public function store(StoreProductRequest $request)
    {

        if (request('photo'))
            $photo = request('photo')->store('products');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'photo' => $photo
        ]);
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findorFail($id);

        return view('products.edit', compact('categories', 'product'));
    }

    public function update(StoreProductRequest $request, $id)
    {

        if (request('photo'))
            $photo = request('photo')->store('products');

        $product = Product::findorFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'photo' => $photo
        ]);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findorFail($id);
        $product->delete();
        return redirect()->back();
    }
}
