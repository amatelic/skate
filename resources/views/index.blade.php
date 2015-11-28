@extends('master')
@section('left')
  <h4>Prijava:</h4>
  @include('includes.login')
@endsection
@section('center')
  @foreach($notifications as $notification)
    @include('includes.notification', $notification)
  @endforeach
@endsection
