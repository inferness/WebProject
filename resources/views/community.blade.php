@extends('layout')

@section('title','home')

@section('content')
    <div class="w-6xl mx-5">
        <img class="h-[330px] w-full object-cover" src="{{ asset($community->BannerPath) }}" alt="image description">
        <h1>{{ $community->Name }}</h1>
        <p>{{ $community->Description }}</p>
    </div>
    <div>Disini nanti mungkin tempat Post post di community ini</div>
@endsection
