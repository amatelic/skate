@extends('master')
@section('left')
  <h4>Prijava:</h4>
  @include('includes.login')
@endsection
@section('center')
    @include('includes.images', $imagesByYear)
@endsection
