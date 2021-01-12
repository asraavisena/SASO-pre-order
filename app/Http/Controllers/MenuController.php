<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

// Controller for MENU SASO
class MenuController extends Controller
{
    //
    public function index() {
        
        $menus = Menu::all();
        return view('admin.menus.index', ['menus' => $menus]);
    }

    public function create() {
        $categories = Category::all();

        return view('admin.menus.create', ['categories' => $categories]);
    }

    public function store(Request $request) {
        // It will be refactored again after there is Images and an User

        $categories = Category::all();

        $inputs = $this->validate($request, [
            'name'          => 'required',
            'menu_image'    =>'mimes:jpeg,png,jpg',
            'desc'          => 'required',
            'price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'      => 'required',
            'category_id'   => 'required|numeric',
        ]);

        // if(request('menu_image')){
        //     $inputs['menu_image'] = request('menu_image')->store('images');
        // }

        // Store into database
        $menu = new Menu;
        $menu->name = $request['name'];
        $menu->menu_image = $request->file('menu_image')->store('images');
        $menu->desc = $request['desc'];
        $menu->price = $request['price'];
        $menu->quantity = $request['quantity'];
        $menu->category_id = $request['category_id'];
        $menu->save();

        // Other way
        // $menu = Menu::create($inputs);    

        session()->flash('menu-created-message', 'Menu was created');
        return redirect()->route('menus.index');

    }
}
