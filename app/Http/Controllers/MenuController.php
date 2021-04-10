<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Image;

// Controller for MENU SASO
class MenuController extends Controller
{
    //
    public function index() {
        
        $menus = Menu::all();
        return view('admin.menus.index', ['menus' => $menus]);
    }

    public function create() {
        $categories = Category::all();
        $menus = Menu::all();

        // dd( $categories ->isEmpty());
        
        if ($categories ->isEmpty()){
            return redirect()->route('categories.index');
        } else {
            return view('admin.menus.create', ['categories' => $categories]);
        }
    }

    public function edit(Menu $menu){
        return view('admin.menus.edit', [
            'menu' => $menu,
            'categories' => Category::all()
            ]);
    }

    public function show(Menu $menu){
        return view('admin.menus.show', [
            'menu' => $menu
            ]);
    }

    public function store(Request $request) {
        // It will be refactored again after there is Images and an User

        $categories = Category::all();

        $inputs = $this->validate($request, [
            'name'          => 'required',
            'desc'          => 'required',
            'price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'      => 'required',
            'category_id'   => 'required|numeric',
        ]);


        // Store into database
        $menu = new Menu;
        $menu->name = $request['name'];
        $menu->desc = $request['desc'];
        $menu->price = $request['price'];
        $menu->quantity = $request['quantity'];
        $menu->category_id = $request['category_id'];
        $menu->save();

        // Other way
        // $menu = Menu::create($inputs);    

        session()->flash('menu-created-message', 'Menu was created');
        return redirect()->route('menus.index');
    }

    public function upload(Request $request, Menu $menu){

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
            $file->move('storage/images/menus', $newImageName);

            // $path = $request->file('image')->storeAs('images', $newImageName);
            // $file->storeAs('images', $newImageName);
        }      
        
        $image = new Image;
        $image->path = $newImageName;
        $image->label = $request['label'];
        $menu->images()->save($image);

        $request->session()->flash('image-upload-message', 'Image has been uploaded');

        return back();
    }

    public function update(Menu $menu){
        $categories = Category::all();

        $inputs = request()->validate([
            'name'          => 'required',
            'desc'          => 'required',
            'price'         => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'      => 'required',
            'category_id'   => 'required|numeric',
        ]);

        $menu->name = $inputs['name'];
        $menu->desc = $inputs['desc'];
        $menu->price = $inputs['price'];
        $menu->quantity = $inputs['quantity'];
        $menu->category_id = $inputs['category_id'];
        

        $menu->save();

        session()->flash('menu-updated-message', 'Menu updated: '. $menu->name );
        return redirect()->route('menus.index');
    }

    public function destroy(Menu $menu, Request $request) {
        $menu->delete();
        $event->images()->delete();
        $request->session()->flash('menu-destroy-message', 'Menu deleted: ' . $menu->name);
        return redirect()->route('menus.index');
    }

    public function img_delete(Menu $menu, Request $request) {
        $ids = array();

        foreach($menu->images as $image)
        {
            // File::delete($photo->path);

            $ids[] = $image->id;
        }

        $menu->images()->whereId($ids)->delete();

        // Photo::whereIn('id',$ids)->delete();

        // $album->delete();

        // $menu->images()->delete();
        $request->session()->flash('image-destroy-message', 'Image has been deleted');
        
        return back();
    }
}
