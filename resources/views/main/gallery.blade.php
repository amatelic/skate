@extends('master')
@section('left')
    @include('includes.calender')
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
