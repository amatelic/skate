<?php

namespace App\Http\Controllers;

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
        $articles = Article::all();
        $lenght = count($articles)/10;
        $articles = $articles->take(10);
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
        if($request->ajax()){
          $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
          ]);

        // $artilce = createArticle($request);
        return $request->all();
        }
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
        //
    }

    public function createArticle($request)
    {
      $article = new Article;
      $article->name = $request->get('name');
      $article->body = $request->get('body');
      $article->image_dir = $request->get('name') . "_" . time();

      $article->save();

      return $article;
    }
    public function pagination($id)
    {
      $count = $id - 1;
      $articles = Article::skip($count)->take(10)->get();
      return $articles;
    }
}
