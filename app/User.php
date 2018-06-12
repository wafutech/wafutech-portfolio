<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
        return $this->hasMany('App\UserSkill');
    }

    

     public function technologies()
    {
        return $this->hasMany('App\UserTechnology');
    }

     public function usersportfolio()
    {
        return $this->hasOne('App\PortfolioUser');
    }

     public function portfolio_social()
    {
        return $this->hasMany('App\PortfolioSocial');
    }

     public function comments()
    {
        return $this->hasMany('App\PostComment');
    }

     public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
