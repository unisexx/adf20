<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMsg extends Model
{
    protected $table = 'chat_msgs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'chat_room_id',
        'text',
        'user_id',
        'is_read',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'user_id');
    }
}
