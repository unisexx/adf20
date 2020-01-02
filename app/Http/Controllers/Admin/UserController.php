<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $rs = User::select('*')->where('is_admin', '!=', '1')->orWhereNull('is_admin');
        $rs = $rs->orderBy('id', 'desc')->get();

        return view('admin.user.index', compact('rs'));
    }

    public function ban($id)
    {
        $user = User::find($id);
        $user->ban();

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }

    public function unban($id)
    {
        $user = User::find($id);
        $user->unban();

        set_notify('success', 'บันทึกข้อมูลสำเร็จ');
        return back();
    }
}
