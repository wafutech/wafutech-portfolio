<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{
    protected $fillable =['project_id','technology_id'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }

    public function technology()
    {
    	return $this->belongsTo('App\Technology');
    }
}
