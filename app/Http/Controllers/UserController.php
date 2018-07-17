<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('Register');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
        $user = new  User();
        $user->name= $request['name'];
        $user->email= $request['email'];
        $user->password= bcrypt($request['password']);
        $user->save();
        $role =  Role::where('name','Techar')->first();
        $user->attachRole($role ->id);

        Return redirect()->route('home');

    }

    public function admin()
    {
        return view('admin-home');
    }

    public function techar()
    {
        return view('Techar-home');
    }

    public function student()
    {
        return view('home');
    }
    
}
