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

    public function edit(Menu $menu){
        return view('admin.menus.edit', [
            'menu' => $menu,
            'categories' => Category::all()
            ]);
    }

    public function show(Menu $menu){
        return view('admin.menus.show', [
            'menu' => $menu
            ]);
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

        if ($request->hasFile('menu_image')) {
            $menu->menu_image = $request->file('menu_image')->store('images');
        }

        // Store into database
        $menu = new Menu;
        $menu->name = $request['name'];
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

    public function update(Menu $menu){
        $categories = Category::all();

        $inputs = request()->validate([
            'name'          => 'required',
            'menu_image'    =>'mimes:jpeg,png,jpg',
            'desc'          => 'required',
            'price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'      => 'required',
            'category_id'   => 'required|numeric',
        ]);

        if(request('menu_image')){
            $inputs['menu_image'] = request('menu_image')->store('images');
            $menu->menu_image = $inputs['menu_image'];
        }

        $menu->name = $inputs['name'];
        $menu->desc = $inputs['desc'];
        $menu->price = $inputs['price'];
        $menu->quantity = $inputs['quantity'];
        $menu->category_id = $inputs['category_id'];
        

        $menu->save();

        session()->flash('menu-updated-message', 'Menu updated: '. $menu->name );
        return redirect()->route('menus.index');
    }

    public function destroy(Menu $menu, Request $request) {
        $menu->delete();
        $request->session()->flash('menu-destroy-message', 'Menu deleted: ' . $menu->name);
        return redirect()->route('menus.index');
    }
}
