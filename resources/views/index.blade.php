@extends('master')
@section('center')
  @foreach($articles as $article)
      <article>
        <h1>{{$article->title}}</h1>
        <div class="text">
          <p>{{$article->body}}</p>
        </div>
        <a href="article/{{$article->id}}">Preberi članek</a>
      </article>
  @endforeach
@endsection
