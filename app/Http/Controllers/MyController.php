<?php

namespace App\Http\Controllers;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('my.profile');
    }
}
