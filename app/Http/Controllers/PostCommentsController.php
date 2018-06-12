<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;
use Validator;
use Illuminate\Support\Facades\Input;
use Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $comments = PostComment::with('replies')->get();
        return $comments;
    }
    /*public function index($id=null)
    {
        if($id!=null)
        {
            $comments = PostComment::where('post_id',$id);
            if($comments)
            {
                return $comments;
            }
            return 'No comments for this post';

        }

        $comments = PostComment::all();
        return $comments;
    }*/

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

          'comment'           => 'required',
                                             

      );

         
    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }

    //If the comment has a parent
    //$comment_parent_id = $request->parent_id;
    $ip = '127.0.0.1';
   /* if($comment_parent_id>0)
    {
        $parentId = $comment_parent_id;
    }
$parentId=0;*/

    $comment = new PostComment;
    $comment->comment = $request->comment;
    $comment->post_id = $request->post_id;
    $comment->author = 2;
    $comment->comment_parent_id = $request->comment_parent_id;
    $comment_ip = $ip;
    $comment->approved = 1;
    $comment->save();

    return $comment;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = PostComment::find($id);
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = PostComment::find($id);
        return $comment;
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
        $comment = PostComment::find($id);
      $input = $request->all();
      $comment->update($input);
      return 'Comment Updated!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = PostComment::find($id);
        $comment->delete();
        return 'Comment Deleted!';
    }
}
