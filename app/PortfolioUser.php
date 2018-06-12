<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioUser extends Model
{
    protected $fillable = ['user_id','portfolio_name','title','profile_image','phone','logo','bio','about','hobies'];

    

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
