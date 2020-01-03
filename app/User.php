<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rennokki\Befriended\Contracts\Following;
use Rennokki\Befriended\Contracts\Liking;
use Rennokki\Befriended\Traits\Follow;
use Rennokki\Befriended\Traits\Like;

class User extends Authenticatable implements BannableContract, Following, Liking
{
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
    use Notifiable;
    use Bannable;
    use Follow;
    use Like;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    # Social Info
    public function socialInfo()
    {
        return $this->hasMany('App\Models\SocialInfo')->orderBy('id', 'asc');
    }

    public function facebook()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'facebook');
    }

    public function instagram()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'instagram');
    }

    public function line()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'line');
    }

    public function twitter()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'twitter');
    }

    public function youtube()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'youtube');
    }

    public function tiktok()
    {
        return $this->hasOne('App\Models\SocialInfo')->where('provider', 'tiktok');
    }
}
