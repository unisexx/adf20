<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $primaryKey = 'id';

    protected $fillable = [
        'start_date',
        'start_date_submit',
        'end_date',
        'end_date_submit',
        'imgur',
        'url',
        'status',
    ];
}
