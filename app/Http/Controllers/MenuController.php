<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controller for MENU SASO
class MenuController extends Controller
{
    //
    public function index(){
        
        return view('admin.menus.index');
    }
}
