<?php

namespace App\Http\Controllers;
use App\Project;
use Validator;
use App\ProjectFeature;
use App\ProjectTechnology;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projects = Project::all();

        $projects =Project::with('features','project_technologies')->get();
        return $projects;
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

          'project_title'           => 'required',
            'project_desc'           => 'required',

          'project_thumbnail'           => 'required|image|mimes:jpeg,jpg,png',
          'url'           => '',
          'features'=>'required',
                           

      );


    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }

    
    //upload project thumbnail
    $path ='';
    if($request->hasFile('project_thumbnail')) 
      {
       

        $file = $request->file('project_thumbnail');

        //$path = $file->store('images/projects');
        //$path = $file->getClientOriginalName();
         //Move Uploaded File
      $destinationPath = 'images/projects';
    $thumbnailName = "project".Date('YMdhis');

     $path =  $file->move($destinationPath,$thumbnailName.".".$file->getClientOriginalExtension());
     $path = str_replace('\\', '/', $path);
       
      
    }
        /*$file = $request->file('project_thumbnail');
        //double check if the file is valid
        if(!$file->isValid())
        {
            $image = Storage::disk('public')->putFile('images/portfolio',$file);
            $path = 'images/portfolio'.Str::random(40).$file->getClientOriginalExtension();
            Storage::disk('public')->put($file);
         
      }*/
     

      $project = new Project;
        
    $project->project_title = $request->project_title;
    $project->tag_line = $request->tag_line;
    $project->project_desc = $request->project_desc;
    $project->project_thumbnail = $path;
    $project->url = $request->url;
   $project->save();


        

    //save project features associated with the project;

    $features = [];
    $features = $request->features;

    for($i=0;$i<count($features);$i++)
    {
        $feature = new ProjectFeature;
        $feature->project_id = $project->id;
        $feature->feature = $features[$i];
        $feature->save();
    }


    //Save technologies
      /*  $technologies = $request->technologies;

     for($i=0;$i<count($technologies);$i++)
    {
        $technology = new ProjectTechnology;
        $feature->project_id = $project->id;
        $technology->technology_id = $technologies[$i];
        $technology->save();
    }*/

    return 'Success';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return $project;
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
        $project = Project::find($id);
        $input = $request->all();
        $project->update($input);
        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return 'Project Removed!';
    }
}
