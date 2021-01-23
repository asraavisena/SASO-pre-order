<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index() {
        
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category){
        return view('admin.categories.show', [
            'category' => $category
            ]);
    }

    public function store(){
        request()->validate([
            'name' => 'required'
        ]);
        Category::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('_'),
        ]);
        session()->flash('category-created-message', 'Category was created');
        return back();
    }

    //**  Another form for store but it does not have automatically added slug yet **//
    // public function store(Request $request) {

    //     $inputs = $this->validate($request, [
    //         'name' => 'required',
    //         'slug' => 'required',
    //     ]);

    //     Category::create($inputs);
    //     session()->flash('category-created-message', 'Category was created');
    //     return redirect()->route('categories.index');

    // }
}
