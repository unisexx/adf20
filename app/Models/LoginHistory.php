<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table = 'login_histories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'ip',
        'country_name',
        'country_code',
        'region_code',
        'region_name',
        'city_name',
        'zip_code',
        'iso_code',
        'postal_code',
        'latitude',
        'longitude',
        'metro_code',
        'area_code',
    ];
}
