<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

// Controller for MENU SASO
class MenuController extends Controller
{
    //
    public function index() {
        
        $menus = Menu::all();
        return view('admin.menus.index', ['menus' => $menus]);
    }

    public function create() {
        return view('admin.menus.create');
    }

    public function store(Request $request) {

        $inputs = $this->validate($request, [
            'name' => 'required',
            'menu_image'=>'mimes:jpeg,png,jpg',
            'desc' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required',
        ]);

        Menu::create($inputs);
        session()->flash('menu-created-message', 'Menu was created');
        return redirect()->route('menus.index');

    }
}
