<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Province;
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
        $provinces = Province::select('id', 'title')->orderBy('title', 'asc')->get();
        return view('my.profile', compact('provinces'));
    }

    public function profile_save(ProfileRequest $request)
    {
        // $requestData = $request->all();
        // dd($requestData);

        if ($request->hasFile('imgUpload')) {
            $image = Imgur::upload($request->imgUpload);
            // Get imgur image link.
            $imgur = $image->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        }

        // dd($requestData);
        // dd($request->except('_token', 'user_id'));

        Profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'display_name' => $request->display_name,
                'introduce'    => $request->introduce,
                'publish'      => $request->publish ?? '0',
                'imgur'        => $imgur ?? $request->old_imgur,
                'province_id'  => $request->province_id,
            ]
        );

        return back();
    }
}
