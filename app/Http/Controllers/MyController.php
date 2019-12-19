<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Auth;
use Imgur;

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

    public function profile_save(ProfileRequest $request)
    {
        $requestData = $request->all();

        $image = Imgur::upload($request->imgUpload);
        // Get imgur image link.
        $requestData['imgur'] = $image->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        $requestData['user_id'] = Auth::user()->id;
        Profile::create($requestData);

        return back();
    }
}
