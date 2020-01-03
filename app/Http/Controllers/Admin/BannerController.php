<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Imgur;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banners = Banner::select('*');
        $banners = $banners->orderBy('end_date', 'desc')->get();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.form');
    }

    public function store(BannerRequest $request)
    {
        # Banner Imgur
        if ($request->hasFile('imgUpload')) {
            $image = Imgur::upload($request->imgUpload);
            // Get imgur image link.
            $imgur = $image->link(); //"https://i.imgur.com/XN9m1nW.jpg"
        }

        # Profile
        Banner::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'url'               => $request->url,
                'start_date'        => $request->start_date,
                'start_date_submit' => $request->start_date_submit,
                'end_date'          => $request->end_date,
                'end_date_submit'   => $request->end_date_submit,
                'imgur'             => $imgur ?? $request->old_imgur,
                'status'            => $request->status ?? '0',
            ]
        );

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return redirect('zadmin/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
