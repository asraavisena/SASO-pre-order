<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Cart;

class CartController extends Controller
{
    // TEMPORARY WILL BE DELETED
    public function index() {

        return view('admin.menus.cart');
    }

    public function store(Request $request) {
        // dd($request->id);
        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Models\Menu');
        session()->flash('cart-added', 'Menu added in Cart');
        return redirect()->route('cart.index');
    }

    public function increasedQty($id) {
        $menu = Cart::get($id);
        $qty = $menu->qty + 1;
        Cart::update($id, $qty);
    }

    public function decreasedQty($id) {
        $menu = Cart::get($id);
        $qty = $menu->qty - 1;
        Cart::update($id, $qty);
    }

    public function remove($id) {
        Cart::remove($id);
        session()->flash('cart-removed', 'Menu has been Removed in Cart');
        return back();
    }
}
