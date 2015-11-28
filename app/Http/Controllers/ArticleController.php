<?php

namespace App\Http\Controllers;
use Validator;
use File;
use Redirect;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->take(10)->get();
        $lenght = count(Article::all())/10;

        return view('admin.article', compact('articles', 'lenght'));
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
        $v = Validator::make($request->all(), ['title' => 'required','body' => 'required']);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $this->createArticle($request);
        // $notification = Article::create($request->all());
        return Redirect::to('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      $notification = Article::find($id);
      $notification->delete();
      return Article::orderBy('id', 'DESC')->take(10)->get();;
    }

    public function createArticle($request)
    {
      Article::create(array(
        "title" => $request->get('title'),
        "body" => $request->get('body'),
        "image_dir" => date("Y") . "/" . str_replace(' ', '_', $request->get('title')) . "_" . time(),
      ));
    }
    public function pagination($id)
    {
      $count = $id - 1;
      $articles = Article::skip($count)->take(10)->get();
      return $articles;
    }

    public function parseData($ArticleCollection)
    {
      $images = [];
      foreach ($ArticleCollection as $value) {
        $images[] = $this->getImages($value);
      }
      return $images;
    }

    public function getImages($article)
    {
      $images = [];
      $dir = $article->image_dir;
      $path = public_path("photos/". $article->image_dir);
      $article->image_dir = [];
      if(File::exists($path)){
        foreach(File::allFiles($path) as $key => $image){
            $images[] = preg_replace('/.+\/public\//', "/", $image->getPathname());
        }
      }
      return $images;

    }
    public function showArticle($value='')
    {
      $articles = Article::all();
      $lenght = count($articles)/10;
      $articles = $articles->take(10);
      $imageDir = $this->parseData($articles);

      return view('article', compact('articles', 'lenght', 'imageDir'));
    }
}
