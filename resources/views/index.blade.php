@extends('master')
@section('left')

  <h4>Kalender:</h4>
  <table class="skavti-calender">
    <thead class="head-dates"></thead>
    <tbody class="body-dates"></tbody>
  </table>
@endsection
@section('center')
  @foreach($notifications as $notification)
    @include('includes.notification', $notification)
  @endforeach
@endsection
