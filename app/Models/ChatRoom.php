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

    public function latestMsg()
    {
        return $this->hasOne('App\Models\ChatMsg')->latest();
    }

    public function fromProfile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'from_user_id');
    }

    public function toProfile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'to_user_id');
    }
}
