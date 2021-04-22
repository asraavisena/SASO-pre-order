<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\Image;

// Controller for EVENT SASO
class EventController extends Controller
{
    // show ALL EVENTS page
    public function index() {
        
        $events = Event::all();
        return view('admin.events.index',['events' => $events]);
    }

    // show CREATE EVENT page
    public function create() {
        // $this->authorize('create', Event::class);
        return view('admin.events.create');
    }

    // show EDIT EVENT page
    public function edit(Event $event){
        return view('admin.events.edit', [
            'event' => $event
            ]);
    }

    // show SHOW EVENT page
    public function show(Event $event){
        return view('admin.events.show', [
            'event' => $event
            ]);
    }

    // method to SAVE EVENT
    public function store(Request $request) {

        // $this->authorize('create', Event::class);

        $inputs = $this->validate($request, [
            'name' => 'required',
            
            'desc' => 'required',
            'started_at' => 'required',
        ]);


        Event::create($inputs);
        session()->flash('event-created-message', 'Event was created');
        return redirect()->route('events.index');

        // auth()->user()->posts()->create($inputs);
    }

    // method to UPLOAD EVENT'S IMAGE
    public function upload(Request $request, Event $event){

        $this->validate($request, [
            'image' =>'mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');   
            $imageNameWithExt = $file->getClientOriginalName();
            // $newImageName = time() . '-' . $imageNameWithExt;

            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $newImageName = time() . '-' . $imageName . '.' . $extension;

            // SHOULD USE STORE RATHER THAN MOVE
            $file->move('storage/images/events', $newImageName);

            // $path = $request->file('image')->storeAs('images', $newImageName);
            // $file->storeAs('images', $newImageName);
        }      
        
        $image = new Image;
        $image->path = $newImageName;
        $image->label = $request['label'];
        $event->images()->save($image);

        $request->session()->flash('image-upload-message', 'Image has been uploaded');

        return back();
    }

    // method to UPDATE EVENT
    public function update(Event $event){
        $inputs = request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'started_at' => 'required',
        ]);

        $event->name = $inputs['name'];
        $event->desc = $inputs['desc'];
        $event->started_at = $inputs['started_at'];

        $event->save();

        session()->flash('event-updated-message', 'Event updated: '. $event->name );
        return redirect()->route('events.index');
    }

    // method to DESTROY EVENT
    public function destroy(Event $event, Request $request) {
        $event->delete();
        $event->images()->delete();
        $request->session()->flash('event-destroy-message', 'Event deleted: ' . $event->name);
        // Session::flash('message', 'Post was deleted');
        return redirect()->route('events.index');
    }

    // method to DELETE EVENT'S IMAGE
    public function img_delete(Event $event, Request $request) {
        $ids = array();

        foreach($event->images as $image)
        {
            // File::delete($photo->path);

            $ids[] = $image->id;
        }

        $event->images()->whereId($ids)->delete();

        // Photo::whereIn('id',$ids)->delete();

        // $album->delete();

        // $event->images()->delete();
        $request->session()->flash('image-destroy-message', 'Image has been deleted');
        
        return back();
    }
}
