<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use App\PostComment;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validation_rules = array(

          'post_title'           => 'required|string',
            'post_content'           => 'required',

          'content_html' =>'',
          'post_category_id'=>'required',
          //'user_id' =>'required',
          'excerpt' =>'',
          'published' =>'',
                                    

      );

         
    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }

    $post = new Post;
    $post->post_title=$request->post_title;
    $post->post_content=$request->post_content;
    $post->content_html=$request->content_html;
    $post->slug=Str::slug($request->post_title);
    $post->post_category_id=$request->post_category_id;
    $post->excerpt=$request->excerpt;
    $post->user_id=1;//$request->user_id;
    $post->published=$request->published;   
    $post->save();
    //Process tags attached to the post
    /*$tags = [];
    $tags = $request->tags;
    for($i=0;$i<count($tags);$i++)
    {
        $postTag = new PostTag;
        $postTag->post_id = $post->id;
        $postTag->tag_id = $tags[$i];
        $postTag->save();
    }*/

    return $post;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post = Post::find($id);
         $input = $request->all();
         $post->update($input);
        return 'Updates Saved!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = Post::find($id);
      $post->delete();
      return 'Post Removed!';
    }
}
