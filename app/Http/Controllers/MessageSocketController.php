<?php

namespace App\Http\Controllers;

use App\Models\MessageSocket;
use Illuminate\Http\Request;

class MessageSocketController extends Controller
{
    public function fetch()
    {
        return MessageSocket::all();
    }

    public function create(Request $request)
    {
        MessageSocket::create([
            'text'    => $request->text,
            'user_id' => $request->user_id,
        ]);

        return $request;
    }
}
