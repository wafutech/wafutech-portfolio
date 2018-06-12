<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;
use App\Post;

class BlogController extends Controller
{
    public function blogPostComments($id)
    {
    	$comments = PostComment::with('replies')->where('post_id',$id)->get();
    	if(!$comments)
    	{
    		return null;
    	}

    	return $comments;
    }

    public function relatedArticles($id)
    {
    	$articles = Post::orderBy('created_at','desc')->where('post_category_id',$id)->limit(5);
    	if($articles)
    	{
    		return $articles;
    	}
    	return null;
    }
}
