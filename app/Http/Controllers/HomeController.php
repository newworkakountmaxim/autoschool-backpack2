<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth for User id
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Rule;

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
        $user = User::find(Auth::user()->id);
        $a = $user->theme()->get();
        return view('home')->withA($a);
        //return view('home');
        //dd($a);
        
        //return redirect('user/question');
        //var_dump(Auth::user()->email);
    }
}
