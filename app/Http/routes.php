<?php
use App\Article;
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

Route::get('/', function () {

    $articles = Article::all()->take(10);
    return view('index', compact('articles'));
});
Route::get('article/{id}', function ($id)
{
  return $id;
});
