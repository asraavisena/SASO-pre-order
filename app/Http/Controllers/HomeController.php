<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::all();
        $categories = Category::all();
        //'mungkin' untuk sementara
        foreach ($categories as $category) {
            foreach ($category->menus as $menu) {
                $category['menus'] = $menu;
            }
        }
        return view('react-welcome', ['events' => $events, 'categories' => $categories]);
    }
}
