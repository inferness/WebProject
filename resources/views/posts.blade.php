@extends('layout')

@section('title','home')

@section('content')
<div class="flex justify-center gap-4">
    <div class=" p-4 max-w-6xl">
        <div>
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                <div>
                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->PostedBy->username}}</a>
                    <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>
            </div>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$post->Title}}</h1>
            <p class=" text-gray-400 break-words">{{$post->Description}}</p>
            @if($post->HasImage)
            <div class="flex justify-center p-3">
                <figure><img src="{{asset($post->ImagePath)}}" alt="">
                </figure>
            </div>
            @endif
            <div class="flex justify-end gap-4 my-2">
                @if($upvoted)
                <a href="{{route('downvotePost', ['postId'=>$post->PostId])}}" class="w-auto text-white bg-orange-500 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bxs-upvote text-xl text-black'></i>
                    <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                </a>
                @else
                <a href="{{route('upvotePost', ['postId'=>$post->PostId])}}" class="w-auto text-white bg-gray-400 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bx-upvote text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                </a>
                @endif
                <div class="w-auto text-white bg-gray-400 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bx-message-dots text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">100</div>
                </div>
            </div>
        </div>
        <br>
        <div>Ini nanti comment section</div>
    </div>
    <div class="sm:flex flex-col w-[300px] min-w-[260px] hidden gap-3">
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->InCommunity->Name}}</h5>
                </a>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">
                    <p style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{$post->InCommunity->Description}}</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top Community</h5>
                </a>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">
                    <p style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">blabla</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
