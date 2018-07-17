<?php

namespace App\Http\Controllers\techar;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TecharController extends Controller
{
    public function home()
    {
        $user = User::whereHas('roles', function($q)
        {
            $q->where('name','Student');
        })->get();

        return view('techar.home',compact('user'));
    }

    public function create()
    {
        $role = Role::find(3);
        return view('techar.add-student',compact('role'));
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
        $role = Role::where('name','Student')->first();
        $user->attachRole($role ->id);

        Return redirect()->route('techar:home');
    }
    
}
