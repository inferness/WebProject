@extends('layout')

@section('content')
    @auth
        <div>{{ Auth::user()->username }}</div>
        <div>{{ Auth::user()->email }}</div>
        <div>{{ Auth::user()->password }}</div>
    @else
        <p>User not authenticated</p>
    @endauth
@endsection
