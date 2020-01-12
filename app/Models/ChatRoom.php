<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_rooms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'from_user_id',
        'to_user_id',
    ];

    public function chatMsg()
    {
        return $this->hasMany('App\Models\ChatMsg')->orderBy('id', 'desc');
    }
}
