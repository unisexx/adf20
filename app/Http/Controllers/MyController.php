<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Province;
use App\Models\Sex;
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
        $sexes = Sex::select('id', 'name')->orderBy('id', 'asc')->get();
        return view('my.profile', compact('provinces', 'sexes'));
    }

    public function profile_save(ProfileRequest $request)
    {
        if ($request->hasFile('imgUpload')) {
            $image = Imgur::upload($request->imgUpload);
            // Get imgur image link.
            $imgur = $image->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        }

        Profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'display_name'      => $request->display_name,
                'introduce'         => $request->introduce,
                'publish'           => $request->publish ?? '0',
                'imgur'             => $imgur ?? $request->old_imgur,
                'province_id'       => $request->province_id,
                'sex_id'            => $request->sex_id,
                'birth_date'        => $request->birth_date,
                'birth_date_submit' => $request->birth_date_submit,
            ]
        );

        return back();
    }
}
