<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMenu;
use Cart;

class CheckoutController extends Controller
{
    // TEMPORARY WILL BE DELETED
    public function index() {
        if(Cart::count() == 0) {
            return redirect()->route('menu.beli');
        } else {
            return view('checkout');
        }
    }

    public function store(Request $request) {
        // Insert into order table
        $order = Order::create([
            'billing_email' => $request -> email,
            'billing_name' => $request -> name,
            'billing_address' => $request -> address,
            'billing_city' => $request -> city,
            'billing_province' => $request -> province,
            'billing_postalcode' => $request -> postalcode,
            'billing_phone' => $request -> phone,
            'billing_subtotal' => Cart::subtotal(),
            'billing_total' => Cart::total()
        ]);

        // Insert into ordermenu table
        foreach (Cart::content() as $item) {
            OrderMenu::create([
                'order_id' => $order->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        dd($order);
        // return redirect()->route('cart.index');
    }
}
