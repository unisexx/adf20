<?php

namespace App\Models;

use Carbon\Carbon;
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
        'imgur_cover_status',
    ];

    public function sex()
    {
        return $this->hasOne('App\Models\Sex', 'id', 'sex_id');
    }

    public function province()
    {
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date_submit'])->age;
    }
}
