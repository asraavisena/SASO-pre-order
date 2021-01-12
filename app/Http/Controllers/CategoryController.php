<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index() {
        
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {

        $inputs = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create($inputs);
        session()->flash('category-created-message', 'Category was created');
        return redirect()->route('categories.index');

    }
}
