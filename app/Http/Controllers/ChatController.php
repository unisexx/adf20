<?php

namespace App\Http\Controllers;

use App\Models\ChatMsg;
use App\Models\ChatRoom;
use Auth;
use DB;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatroom($id)
    {
        $chatroom = ChatRoom::findOrFail($id);

        // permission for privete chat
        if ($chatroom->from_user_id != Auth::user()->id && $chatroom->to_user_id != Auth::user()->id && $chatroom->id != 1) {
            set_notify('error', 'ไม่มีสิทธิ์เข้าใช้งานส่วนนี้');
            return redirect('home');
        }

        $chatmsgs = ChatMsg::where('chat_room_id', $id)->orderBy('id', 'desc')->take(20)->get()->reverse();

        return view('chat.room', compact('chatroom', 'chatmsgs'));
    }

    public function create(Request $request)
    {
        $rs = ChatMsg::create([
            'text'         => $request->text ?? '...',
            'user_id'      => $request->user_id,
            'chat_room_id' => $request->chat_room_id,
        ]);

        return $rs;
    }

    public function chatwith($id)
    {
        // ค้นหาห้องแชทเดิมที่มีอยู่
        $rs = ChatRoom::select('id')->where('from_user_id', $id)->where('to_user_id', Auth::user()->id)->first();
        // dd($rs->id);

        if (is_null(@$rs->id)) {
            // สร้างห้องแชทใหม่
            $rs = ChatRoom::updateOrCreate(
                [
                    'from_user_id' => Auth::user()->id,
                    'to_user_id'   => $id,
                ]
            );
        }

        return redirect('chatroom/' . $rs->id);
    }

    public function chatlist()
    {
        DB::enableQueryLog();

        $rs = ChatRoom::where('from_user_id', Auth::user()->id)->orWhere('to_user_id', Auth::user()->id)
            ->with('latestMsg')
            ->orderBy(function ($q) {
                $q->select('created_at')
                    ->from('chat_msgs')
                    ->whereColumn('chat_room_id', 'chat_rooms.id')
                    ->latest()
                    ->limit(1);
            }, 'desc')->get();

        // dd(DB::getQueryLog());
        return view('chat.list', compact('rs'));
    }
}
