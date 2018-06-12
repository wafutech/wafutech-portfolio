<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioSocial extends Model
{
    protected $fillable = ['user_id','Social','url'];

    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
