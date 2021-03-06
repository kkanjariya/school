<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return redirect()->route('admin:home');

        }
        elseif (Auth::user()->hasRole('Techar'))
        {

//            return view('techar.home');
            return redirect()->route('techar:home');
        }
        else
        {
            return redirect()->route('student:home');
        }
    }
}
