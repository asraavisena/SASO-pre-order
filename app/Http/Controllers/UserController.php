<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
    public function index() {
        
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user){
        return view('admin.users.show', [
            'user' => $user
            ]);
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store() {
        request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'username' => request('name'),
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        session()->flash('user-created-message', 'User was created');
        return redirect()->route('users.index');
    }
}
