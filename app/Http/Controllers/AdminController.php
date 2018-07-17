<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

   public function home()
   {
       $user = User::all();
//       $user = USer::join('roles','roles.id','=','users.id')
//                ->select('users.*','roles.name as rolename')->get();
       return view('admin.home',compact('user'));
   }
    public function create()
    {
        $role = Role::all();
        return view('admin.create' ,compact('role'));
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
        $role = Role::where('name','Techar')->first();
        $user->attachRole($role ->id);

        Return redirect()->route('home');
    }

    public function useredit($id)
    {
        $user = User::find($id);
//        $user->delete();
//        $role = Role::find($id);
        return view('admin.edit',compact('user'));
    }

    public function update($id , Request $request)
    {
        $user = User::find($id);
        $user->name= $request['name'];
        $user->email= $request['email'];
        $user->save();

        return redirect()->route('home');

    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
//        $role = Role::find($id);
        return back();
    }

}
