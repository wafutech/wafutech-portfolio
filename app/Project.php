<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_title','tag_line','project_desc','project_thumbnail','url'];

    public function getProjectThumbnail($value)
    {
        return asset('storage/'.$value);
    }

    public function technologies()
    {
    	return $this->hasMany('App\Technology');
    }

    public function features()
    {
    	return $this->hasMany('App\ProjectFeature');
    }

    public function project_technologies()
    {
    	return $this->hasMany('App\ProjectTechnology');
    }
}
