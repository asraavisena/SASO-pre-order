<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // TEMPORARY WILL BE DELETED
    public function index() {
        return view('checkout');
    }

    public function store(Request $request) {
        dd($request->all);
        // return redirect()->route('cart.index');
    }
}
