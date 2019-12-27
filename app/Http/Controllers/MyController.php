<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Province;
use App\Models\Sex;
use App\Models\SocialInfo;
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

        # Profile Imgur
        if ($request->hasFile('imgUpload')) {
            $image = Imgur::upload($request->imgUpload);
            // Get imgur image link.
            $imgur = $image->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        }

        # Cover Imgur
        if ($request->hasFile('imgUploadCover')) {
            $image_cover = Imgur::upload($request->imgUploadCover);
            // Get imgur image link.
            $imgur_cover = $image_cover->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        }

        # Profile
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
                'imgur_cover'       => $imgur_cover ?? $request->old_imgur_cover,
            ]
        );

        #Social Info
        if (isset($request->social_info['provider'])) {
            foreach ($request->social_info['provider'] as $i => $item) {
                SocialInfo::updateOrCreate(
                    [
                        'user_id'  => Auth::user()->id,
                        'provider' => $request->social_info['provider'][$i],
                    ],
                    [
                        'link'   => $request->social_info['link'][$i],
                        'status' => $request->social_info['status'][$item] ?? '0',
                    ]
                );
            }
        }

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }
}
