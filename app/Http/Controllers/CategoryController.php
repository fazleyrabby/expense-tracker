<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create(){
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'type' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully created!');;
    }


    public function edit(Category $category){
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $this->validate($request, [
            'name' => 'required|unique:categories,id,'.$category->id,
            'type' => 'required',
        ]);

        $category->name = $request->name;
        $category->type = $request->type;
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully updated!');;
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category successfully deleted!');;
    }
}
