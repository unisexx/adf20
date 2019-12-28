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
        $users = User::orderBy('id', 'desc')->get();
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

    public function upvote($id)
    {
        @Auth::user()->vote(1, User::class);
        return back();
    }

    public function downvote($id)
    {
        $targets = User::find($id);
        @Auth::user()->downvote($targets);

        return back();
    }
}
