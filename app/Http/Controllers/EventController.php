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

    public function edit(Event $event){
        return view('admin.events.edit', [
            'event' => $event
            ]);
    }

    public function show(Event $event){
        return view('admin.events.show', [
            'event' => $event
            ]);
    }

    public function store(Request $request) {

        // $this->authorize('create', Event::class);

        $inputs = $this->validate($request, [
            'name' => 'required',
            'event_image'=>'mimes:jpeg,png,jpg',
            'desc' => 'required',
            'started_at' => 'required',
        ]);

        if(request('event_image')){
            $inputs['event_image'] = request('event_image')->store('images');
        }

        Event::create($inputs);
        session()->flash('event-created-message', 'Event was created');
        return redirect()->route('events.index');

        // auth()->user()->posts()->create($inputs);
    }

    public function update(Event $event){
        $inputs = request()->validate([
            'name' => 'required',
            'event_image'=>'mimes:jpeg,png,jpg',
            'desc' => 'required',
            'started_at' => 'required',
        ]);

        if(request('event_image')){
            $inputs['event_image'] = request('event_image')->store('images');
            $event->event_image = $inputs['event_image'];
        }

        $event->name = $inputs['name'];
        $event->desc = $inputs['desc'];
        $event->started_at = $inputs['started_at'];

        $event->save();

        session()->flash('event-updated-message', 'Event updated: '. $event->name );
        return redirect()->route('events.index');
    }

    public function destroy(Event $event, Request $request) {
        $event->delete();
        $request->session()->flash('event-destroy-message', 'Event deleted: ' . $event->name);
        // Session::flash('message', 'Post was deleted');
        return redirect()->route('events.index');
    }
}
