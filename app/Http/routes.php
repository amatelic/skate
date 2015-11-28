<?php
use App\Notification;
use Storage;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'NotificationController@showNotification');
Route::resource('/articles', 'ArticleController@showArticle');
Route::get('/steg', function(){
  return view('main.steg');
});

Route::get('/gallery', 'ImageController@showGallerys');
// Route::get('/gallery', function () {
//     $dirs = Storage::disk('public')->allDirectories('photos');
//
//   foreach ($dirs as $dir ) {
//     var_dump(public_path() . "/" . $dir);
//
//     var_dump(Store::getDirectory(public_path() . "/" . $dir));
//   }
//     return dd("test");
// });

// Route::get('article/{id}', function ($id)
// {
//   $article = Article::where("id", $id)->get();
//   return $article;
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/', 'AdminController');
    Route::get('/users/filter', 'UserController@filterUsers');
    Route::resource('/users', 'UserController');
    Route::resource('/images', 'ImageController');
    Route::resource('/notifications', 'NotificationController');
    Route::get('/articlePagination/{id}', 'ArticleController@pagination');
    Route::resource('/articles', 'ArticleController');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
