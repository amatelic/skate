@extends('master')
@section('left')
  <h4>Prijava:</h4>
  @include('includes.login')
@endsection
@section('center')
    @include('includes.images', $imagesByYear)
    {{--  Loading images with ajax--}}
    <button type="button" class="load-images">Več slik</button>
@endsection

@section('script')
  <script src="js/images.js" type="text/javascript">
  </script>
@endsection
