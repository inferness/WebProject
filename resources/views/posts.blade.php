@extends('layout')

@section('title','home')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
        <div>
            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->PostedBy->username}}</a>
            <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
        </div>
    </div>
    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$post->Title}}</h1>
    <p class=" text-gray-400">{{$post->Description}}</p>
    <figure><img src="{{asset($post->ImagePath)}}" alt="">
    </figure>
</div>
@endsection
