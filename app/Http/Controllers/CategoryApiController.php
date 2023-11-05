<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['data' => $categories]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product' => 'required|string',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted'], 204); // Return a 204 No Content status after deletion.
    }
}
