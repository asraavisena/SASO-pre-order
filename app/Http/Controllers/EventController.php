<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controller for EVENT SASO
class EventController extends Controller
{
    //
    public function index(){
        
        return view('admin.events.index');
    }
}
