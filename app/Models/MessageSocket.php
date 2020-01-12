<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageSocket extends Model
{
    protected $table = 'message_sockets';

    protected $primaryKey = 'id';

    protected $fillable = [
        'text',
        'user_id',
        'from_user_id',
        'to_user_id',
    ];
}
