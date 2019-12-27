<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'display_name',
        'introduce',
        'imgur',
        'publish',
        'province_id',
        'sex_id',
        'birth_date',
        'birth_date_submit',
        'imgur_cover',
    ];
}
