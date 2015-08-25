@extends('master')
@section('center')
  @foreach($articles as $article)
      <article>
        <h2>{{$article->title}}</h2>
        <div class="text">
          <p>{{$article->body}}</p>
        </div>
        <div class="gallery">
          {{$article->image_dir}}
        </div>
        <a href="article/{{$article->id}}">Preberi članek</a>
      </article>
  @endforeach
@endsection

@section('script')
  <script src="js/article.js" type="text/javascript">

  </script>
@endsection
