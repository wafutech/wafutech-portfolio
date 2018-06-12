<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title','post_content','content_html','post_category_id','user_id','slug','views','excerpt','published'];

    public function postCategory()
    {
    	return $this->belongsTo('App\PostCategory');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->hasMany('App\Postag');
    }

     public function comments()
    {
        return $this->hasMany('App\PostComment');
    }

     


}
