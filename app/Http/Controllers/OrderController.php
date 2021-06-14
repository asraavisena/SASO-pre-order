<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMenu;

class OrderController extends Controller
{
    //
    public function index() {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders,]);
    }
}