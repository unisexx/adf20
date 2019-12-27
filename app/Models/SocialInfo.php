<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialInfo extends Model
{
    protected $table = 'social_infos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'provider',
        'link',
        'status',
        'user_id',
    ];
}
