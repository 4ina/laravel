<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        $category = new Category();
        return view('categories.edit', compact('category'));

    }
    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('categories.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $category = Category::findorFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name
        ]);
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
