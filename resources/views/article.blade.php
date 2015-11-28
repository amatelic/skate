@extends('master')
@section('left')
  <h4>Prijava:</h4>
  @include('includes.login')
@endsection
@section('center')
  @for($i=0; $i < count($articles) ; $i++)
    @include('includes.posts', ['article' => $articles[$i], 'imagesDir' => $imageDir[$i]])
  @endfor
@endsection
@section('script')
  <script src="js/index.js" type="text/javascript">
  </script>
@endsection
