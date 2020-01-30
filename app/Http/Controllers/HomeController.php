<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::withoutBanned()->orderBy('updated_at', 'desc')->with('socialInfo')->paginate(9);
        return view('home', compact('users'));
    }

    public function follow($id)
    {
        @Auth::user()->follow(User::find($id));
        return back();
    }

    public function unfollow($id)
    {
        @Auth::user()->unfollow(User::find($id));
        return back();
    }

    public function like($id)
    {
        @Auth::user()->like(User::find($id));
        return back();
    }

    public function unlike($id)
    {
        @Auth::user()->unlike(User::find($id));
        return back();
    }
}
