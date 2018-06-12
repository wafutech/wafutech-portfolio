<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioUser;
use App\PortfolioSocial;
use App\SkillUser;
use App\UserTechnology;
use Auth;
use App\Profile;
use App\Project;
use Illuminate\Support\Facades\Storage;
use DB;


class PortfoliosController extends Controller
{
	public function __construct()
	{

	}

  public function index()
  {
    $profile = PortfolioUser::all();
    return $profile;
  }
    public function profile(Request $request)
    {
    	$validation_rules = array(

          'portfolio_name'           => 'required',
            'title'           => 'required',

          'profile_image'           => 'required|image|mime:jpeg,jpg,png',
          'phone'           => 'required|url',

          'logo'           => 'image|mime:jpeg,jpg,png',
          'phone'           => 'required|numeric|digits:10',
          'bio'=>'required|string',
          'about'=>'required|string',
          'hobies'=>'string',
                           

      );

    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }
    //upload upload profile image
    $path ='';
    $logo ='';
      if($request->hasFile('profile_image')) 
      {
        $avatar = $request->file('profile_image');
        $path = $avatar->store('images/profile');
        
         $avatarName = $request->portfolio_name.Date('YMdhis');
        $request->image_file->move(public_path('images/profile'), $avatarName);

         
      }

      //Upload logo if any

      if($request->hasFile('logo')) 
      {
        $logo = $request->file('logo');
        $path = $avatar->store('images/profile');
        
         $logoName = $request->portfolio_name.Date('YMdhis');
        $request->image_file->move(public_path('images/profile'), $logoName);

         
      }
    $user = new PortfolioUser;
    $user->user_id = Auth::User()->id;
    $user->portfolio_name = $request->portfolio_name;
    $user->title = $request->title;
    $user->profile_image = $path;
    $user->phone = $request->phone;
    $user->logo = $logo;
    $user->bio = $request->bio;
    $user->about = $request->about;
    $user->hobies = $request->hobies;
    $user->save();
//Save user skills
    $skills = $request->skills;
    for($i=0;$i<count($skills);$i++)
    {
    $skill = new SkillUser;
    $skill->user_id = $user->user_id;
    $skill->skill_id = $skills[$i];
    $skill->skill_desc = $request->skill_desc;
    $skill->save();	
    }

    //Process technologies associated with the user

    $technologies = $request->technologies;
    for($i=0;$i<count($technologies);$i++)
    {
        $technology = new UserTechnology;
        $technology->user_id = $user->user_id;
        $technology->technology_id = $technologies[$i];
        $technology->save();

    }

    //process social networks
    $social_networks = $request->social_networks;
    for($i=0;$i<count($social_networks);$i++)
    {
    	$social = new PortfolioSocial;
    	$social->user_id = $user->user_id;
    	$social->social = $social_networks['social'][$i];
    	$social->url = $social_networks['url'][$i];
    	$social->save();
    }

    return 'Success!';
    
    	
    }

 
    public function aboutMe()
    {
      $aboutme = Profile::where('portfolio_name','Ronald Wekesa Wafula')->first();
      return $aboutme;
      
    }

    public function editProfile($id)
    {
      $profile = Profile::find($id);
      return $profile;
    }

    public function updateProfile(Request $request)
    {
      $profile = Profile::find($id);
      $input = $request->all();
      $profile->update($input);
      return 'success';
    }

    public function projectImages()
    {
      $images = DB::table('projects')->where('id', 3)->first();
      //echo str_replace("world","Peter","Hello world!");

      $url =     str_replace('//','/',Storage::url($images->project_thumbnail));
      return $url;
    }
}
