<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

// Controller for EVENT SASO
class EventController extends Controller
{
    //
    public function index() {
        
        $events = Event::all();
        return view('admin.events.index',['events' => $events]);
    }

    public function create() {
        // $this->authorize('create', Event::class);
        return view('admin.events.create');
    }

    public function store(Request $request) {

        // $this->authorize('create', Event::class);

        $inputs = $this->validate($request, [
            'name' => 'required',
            'event_image'=>'mimes:jpeg,png,jpg',
            'desc' => 'required',
            'started_at' => 'required',
        ]);

        Event::create($inputs);
        session()->flash('event-created-message', 'Event was created');
        return redirect()->route('events.index');

        // auth()->user()->posts()->create($inputs);
    }
}
