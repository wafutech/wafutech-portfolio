<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    protected $fillable = ['user_id','skill_id','skill_desc'];

    public function skill()
    {
    	return $this->belongsTo('App\Skill');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
