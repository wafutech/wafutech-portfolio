<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Profile;

class UserprofileController extends Controller
{
    public function uploadAvatar(Request $request)
    {
    	$validation_rules = array(

         

          'avatar'           => 'required|image|mimes:jpeg,jpg,png',
                                     

      );

    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }
    //upload project thumbnail
    $path ='';
      if($request->hasFile('avatar')) 
      {
        $avatar = $request->file('avatar');
        $path = $avatar->store('images/profile');
        
         $thumbnailName = "avatar".Date('YMdhis');
        $avatar->move(public_path('images/profile'), $thumbnailName);
         
      }
      //Save path to the database
      $avatar_path = new UserProfile;
      $avatar_path->user_id = 1;
      $avatar_path->avatar = $path;
      $avatar_path->save();
      return $avatar_path->avatar;
      

    }

    public function profile(Request $request)
    {
      /*$validation_rules = array(

          'portfolio_name'           => 'required',
            'title'           => 'required',

          'phone'           => 'required|url',

          'phone'           => 'required|numeric|digits:10',
          'bio'=>'required|string',
          'hobies'=>'string',
                           

      );

    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }*/

    $user = new Profile;
    $user->user_id = 1;
    $user->portfolio_name = $request->portfolio_name;
    $user->title = $request->title;
    $user->nickname = $request->nickname;
    $user->phone = $request->phone;
    $user->bio = $request->bio;
    $user->hobies = $request->hobies;
    $user->save();    
    return 'Success!';
    
      
    }
}
