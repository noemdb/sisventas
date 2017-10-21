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
        //dd(Auth::user());
        
        $user_is_admin = '';
        if(!empty(Auth::user()->profile->is_admin)){
            $user_is_admin = Auth::user()->profile->is_admin;
        }
        
        if($user_is_admin=='Administrador')
            // return redirect()->route('users.home');
            return redirect()->route('users.index');
        else
            return view('home');

        
    }
}
