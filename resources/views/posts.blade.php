@extends('layout')

@section('title','home')

@section('content')
<div class="flex justify-center gap-4 lg:mr-[300px]">
    <div class=" p-4 max-w-6xl flex flex-col justify-start w-full">
        <div>
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                <div>
                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->PostedBy->username}}</a>
                    <p class="text-base text-gray-500 dark:text-gray-400">Joined on {{$post->PostedBy->JoinDate}}</p>
                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{$post->created_at->diffForHumans()}}</time></p>
                </div>
            </div>
            <h1 class="my-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$post->Title}}</h1>
            <p class=" text-gray-400 break-words">{{$post->Description}}</p>
            @if($post->ImagePath)
            <div class="flex justify-center p-3">
                <figure><img src="{{asset($post->ImagePath)}}" alt="">
                </figure>
            </div>
            @endif
            <div class="flex justify-end gap-4 my-2">
                @if($upvoted)
                <a href="{{route('downvotePost', ['id'=>$post->id])}}" class="w-auto text-white bg-orange-500 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bxs-upvote text-xl text-black'></i>
                    <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                </a>
                @else
                <a href="{{route('upvotePost', ['id'=>$post->id])}}" class="w-auto text-white bg-gray-400 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bx-upvote text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                </a>
                @endif
                @if($saved)
                <a href="{{route('unsavePost', ['id'=>$post->id])}}" class="w-auto text-white bg-orange-500 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bxs-pin text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">saved</div>
                </a>
                @else
                <a href="{{route('savePost', ['id'=>$post->id])}}" class="w-auto text-white bg-gray-400 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bxs-pin text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">save</div>
                </a>
                @endif
            </div>
        </div>
        <br>
        <livewire:comments :model="$post"/>
    </div>
    <div class="lg:flex flex-col w-[300px] min-w-[260px] hidden gap-3 fixed right-3">
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <a href="{{url('community/' . $post->InCommunity->CommunityId)}}" class="flex gap-4 w-full items-center">
                    <img src="{{asset('storage/images/avatar/defaultAvatar.jpg')}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                    <div class="my-auto text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->InCommunity->Name}}</div>
                </a>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">
                    <p style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{$post->InCommunity->Description}}</p>
                </div>
                @if($following)
                <a href="{{url('unfollow/'. $post->InCommunity->CommunityId)}}" class=" text-white bg-orange-600 rounded-full flex justify-center px-2 py-1">
                    <!-- <i class='bx bx-plus text-xl text-black'></i> -->
                    <div class="text-black my-auto px-1 font-semibold">Following</div>
                </a>
                @else
                <a href="{{url('follow/'. $post->InCommunity->CommunityId)}}" class=" text-white bg-orange-600 rounded-full flex justify-center px-2 py-1">
                    <!-- <i class='bx bx-plus text-xl text-black'></i> -->
                    <div class="text-black my-auto px-1 font-semibold">Follow</div>
                </a>
                @endif
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top Communities</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Some of the highest followed Communities</p>
                <div class="flex flex-col">
                    @foreach($topCommunities as $c)
                    <a href="{{url('community/' . $c->CommunityId)}}" class="flex gap-4 w-full items-center py-2 hover:bg-gray-500 rounded-md px-2">
                        <img src="{{asset($c->BannerPath)}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                        <div class="my-auto text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{$c->Name}}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
