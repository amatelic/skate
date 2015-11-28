<?php

namespace App\Http\Controllers;
use Storage;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ImageController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get()->take(10);
        return view('images.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $id = $request->input('article_id');

        $article  =  Article::where('id', $id)->first();
        $name = time() . str_replace(' ', '_', $file->getClientOriginalName());

        $file->move('photos/' . $article->image_dir, $name);

        return "Slika je bila dodana.";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        $directory = Article::getImagesPath($article->image_dir);
        return ["article" => $article, "images" => $directory];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
          //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
      $article = Article::where('id', $id)->first();
      $img_file = $request->input('img');
      Article::DeleteImage('photos/' . $article->image_dir. '/' . $img_file);
      return 'Slika je bila zbrisana';
    }

    /**
     * Display gallery by years
     *
     * @param  int  $id
     * @return Response
     */
    public function showGallerys($data = null)
    {
        $imagesByYear = [];
        $year = (isset($data))?$data:date("Y");
        $dirs = Storage::disk('public')->allDirectories('photos/' .$year);
        foreach ($dirs as $key => $dir) {
          $images = File::allFiles("./" . $dir);
          foreach ($images as $key => $image) {
            $imagesByYear[] = (string)$image;
          }
        }

        return view('main.gallery', compact('imagesByYear', 'year'));
    }
}
