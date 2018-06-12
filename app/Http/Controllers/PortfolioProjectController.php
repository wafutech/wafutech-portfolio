<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Project;
use Validator;
use App\ProjectFeature;
use App\ProjectTechnology;

class PortfolioProjectController extends Controller
{
    
    public function storeProjects(Request $request)
    {
    	$validation_rules = array(

          'project_title'           => 'required',
            'project_desc'           => 'required',

          'project_thumbnail'           => 'required|image|mimes:jpeg,jpg,png',
          'url'           => '',
          //'features'=>'required',
                           

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

        
      $destinationPath = 'images/projects';
    $thumbnailName = "project".Date('YMdhis');

     $path =  $file->move($destinationPath,$thumbnailName.".".$file->getClientOriginalExtension());
     $path = str_replace('\\', '/', $path);
       
      
    }        
     

      $project = new Project;
        
    $project->project_title = $request->project_title;
    $project->tag_line = $request->tag_line;
    $project->project_desc = $request->project_desc;
    $project->project_thumbnail = $path;
    $project->url = $request->url;
   $project->save();

   return json_encode($project->id);

    }

    public function storeProjectFeatures(Request $request)
    {
        
      $features = $request->all();
   
       for($i=0;$i<count($features);$i++)
       {
        $feature = new ProjectFeature;
        $feature->project_id = $features[$i]['project_id'];
        $feature->feature = $features[$i]['feature'];
        $feature->save();
       }
       return 'success';

    }


    public function storeProjectTechnologies(Request $request)
    {
    	$techs = $request->all();

      //Since the vue index is not ordered on increament from zero, extract only values and regenerate the array
      $techs = array_values($techs);

        //Remove any duplicate values from post request
      $techs = array_unique($techs);
      //fetch project id which is the last array item in the list
      $project_id = array_pop($techs);
      //Then iterate the sanitized array and save each item in the database

      for($i=0;$i<count($techs);$i++)
      {
        
        $technology = new ProjectTechnology;
        $technology->technology_id=$techs[$i];
        $technology->project_id=$project_id;
        $technology->save();
      }
      //Send feedback to the client     

        return 'success';
    }

}
