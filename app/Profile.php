<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','portfolio_name','title','phone','bio','hobies','nickname'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
