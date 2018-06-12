<?php

use Illuminate\Http\Request;

/*header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');*/

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


/*##########################
# API AUTHENTICATION
#############################*/

  /*Route::post('auth/register', 'JWTAuthenticateController@register');

  Route::post('auth/login', 'JWTAuthenticateController@login');*/
Route::group(['middleware' => 'jwt.auth'], function(){  
 Route::post('auth/logout', 'JWTAuthenticateController@APIlogout');

 // Route::get('auth/user', 'JWTAuthenticateController@user');
});
Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::patch('auth/refresh', 'JWTAuthenticateController@refresh');
});

Route::group(['middleware'=>'cors'],function()
{
  Route::post('auth/register','APIAuthController@register');
  Route::post('auth/login','APIAuthController@login');
 Route::group(['middleware' => 'jwt.auth'], function(){
  Route::get('auth/user', 'APIAuthController@user');
});

Route::resource('projects','ProjectsController');

Route::resource('skills','SkillsController');
Route::resource('technologies','TechnologiesController');
//Route::post('profile','PortfoliosController@profile');
Route::get('profile','PortfoliosController@index');
Route::get('profile/{id}/edit','PortfoliosController@editProfile');
Route::put('profile/{id}','PortfoliosController@updateProfile');
Route::get('about','PortfoliosController@aboutMe');
Route::get('images','PortfoliosController@projectImages');


Route::post('avatar','UserprofileController@uploadAvatar');
Route::post('profile','UserprofileController@profile');



//Route::post('auth/register', 'JWTAuthenticateController@register');

  //Route::post('auth/login', 'JWTAuthenticateController@login');
 //Route::get('auth/user', 'JWTAuthenticateController@user');

  /**
  /*WAFUTECH BLOG
  **************
  */
  Route::resource('blog/posts','PostsController');

  Route::resource('blog/categories','PostCategoriesController');

  Route::resource('blog/post/comments','PostCommentsController');
  Route::resource('blog/tags','TagsController');

  Route::get('post/comments/{id}','BlogController@blogPostComments');
  Route::get('blog/post/related/{id}','BlogController@relatedArticles');
  Route::post('blog/post/images',function()
{
  try {
  // File Route.
  $fileRoute = "/uploads/";
 
  $fieldname = "file";
 
  // Get filename.
  $filename = explode(".", $_FILES[$fieldname]["name"]);
 
  // Validate uploaded files.
  // Do not use $_FILES["file"]["type"] as it can be easily forged.
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
 
  // Get temp file name.
  $tmpName = $_FILES[$fieldname]["tmp_name"];
 
  // Get mime type.
  $mimeType = finfo_file($finfo, $tmpName);
 
  // Get extension. You must include fileinfo PHP extension.
  $extension = end($filename);
 
  // Allowed extensions.
  $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");
 
  // Allowed mime types.
  $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");
 
  // Validate image.
  if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
    throw new \Exception("File does not meet the validation.");
  }
 
  // Generate new random name.
  $name = sha1(microtime()) . "." . $extension;
  $fullNamePath = dirname(__FILE__) . $fileRoute . $name;
 
  // Check server protocol and load resources accordingly.
  if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") {
    $protocol = "https://";
  } else {
    $protocol = "http://";
  }
 
  // Save file in the uploads folder.
  move_uploaded_file($tmpName, $fullNamePath);
 
  // Generate response.
  $response = new \StdClass;
  $response->link = $protocol.$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"]).$fileRoute . $name;
 
  // Send response.
  echo stripslashes(json_encode($response));
 
} catch (Exception $e) {
   // Send error response.
   echo $e->getMessage();
   http_response_code(404);
}

});
  //Send mail
Route::post('contact','ContactController@sendEmail');


Route::post('portfolio/projects','PortfolioProjectController@storeProjects');
Route::post('portfolio/features','PortfolioProjectController@storeProjectFeatures');
Route::post('portfolio/technologies','PortfolioProjectController@storeProjectTechnologies');

Route::patch('trancate/projects','ManagementController@trancateProjects');

});










