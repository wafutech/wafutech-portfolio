<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFeature extends Model
{
    protected $fillable = ['project_id','feature'];

   

    public function project()
    {
    	return $this->hasMany('App\Project');
    }
}
