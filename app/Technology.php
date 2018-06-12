<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = ['technology'];

     public function technology_user()
    {
        return $this->belongsTo('App\TechnologyUser');
    }

    public function project_technologies()
    {
    	return $this->hasMany('App\ProjectTechnology');
    }
}
