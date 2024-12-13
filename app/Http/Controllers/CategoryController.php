<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'categories' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $path = $request->file('photo')->store('categories', 'public');

        Category::create([
            'photo' => $path,
            'categories' => $request->categories,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('categories.categories')->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'categories' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('categories', 'public');
            $category->photo = $path;
        }

        $category->categories = $request->categories;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->save();

        return redirect()->route('categories.categories')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.categories')->with('success', 'Category deleted successfully!');
    }
}
