<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = ['post_id','author','author_ip','comment','comment_parent_id','approved'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

     public function author()
    {
    	return $this->belongsTo('App\User');
    }

     public function commentreply()
    {
    	return $this->belongsTo('App\PostComment','id');
    }

    public function replies()
    {
        return $this->hasMany('App\PostComment','comment_parent_id');
    }
}
