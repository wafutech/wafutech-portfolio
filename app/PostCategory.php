<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
   protected  $fillable = ['category_name','category_desc','category_slug'];

   public function posts()
   {
   	return $this->hasMany('App\Post');
   }
}
