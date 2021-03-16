<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Event;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index() {
    }

    // public function show(Image $image){
    //     return view('admin.images.show', [
    //         'image' => $image
    //         ]);
    // }

    public function store(){
        request()->validate([
            'name' => 'required'
        ]);
        Image::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('_'),
        ]);
        session()->flash('image-created-message', 'Image was created');
        return back();
    }

    public function destroy(Image $image, Request $request) {
        $image->delete();
        $request->session()->flash('image-destroy-message', 'Image deleted: ' . $image->name);
        return redirect()->route('images.index');
    }
}
