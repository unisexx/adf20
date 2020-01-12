<?php

namespace App\Http\Controllers;

use App\Models\ChatMsg;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatroom($id)
    {
        $chatroom = ChatRoom::findOrFail($id);
        $chatmsgs = ChatMsg::where('chat_room_id', $id)->orderBy('id', 'desc')->take(20)->get()->reverse();

        return view('chat.index', compact('chatroom', 'chatmsgs'));
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
}
