<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class PostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::with('posts')->get();
        return $categories;
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

          'category_name'           => 'required|string',
            'category_desc'           => '',

          //'category_slug'           => 'required|regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i|unique:post_categories',
                                    

      );


    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }

    $category = new PostCategory;
    $category->category_name= $request->category_name;
    $category->category_desc= $request->category_desc;
    $category->category_slug = Str::slug($request->category_name);
    $category->save();

    return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = PostCategory::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = PostCategory::find($id);
        return $category;
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
         $category = PostCategory::find($id);
         $input = $request->all();
         $category->update($input);
        return 'Update Successful';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category = PostCategory::find($id);
         $category->dalete();
        return 'Post Category Removed!';
    }
}
