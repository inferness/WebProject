@extends('layout')

@section('title','CommonGrounds')

@section('content')
<div class="max-w-7xl mx-auto relative">
    <div class=" rounded-2xl overflow-hidden mb-5">
        <div class=" text-center absolute w-full top-9 text-3xl text-black font-bold">CommonGrounds</div>
        <img src="{{asset('images/default/defaultBanner.jpg')}}" alt="defaultBanner" class="max-h-[400px] w-full object-cover">
    </div>
    <div class="flex gap-5 max-w-full">
        <div class="flex flex-col gap-4 w-full">
            @forelse ($posts as $post)
            <a href="{{url( '/post/' . $post->id)}}" class="flex w-full bg-gray-700 max-h-[250px] overflow-hidden rounded-xl max-w-[945px]">
                @if($post->ImagePath)
                <div class="min-w-[200px] w-[200px] overflow-hidden xl:block hidden">
                    <img src="{{ asset($post->ImagePath) }}" alt="" class="h-full max-w object-cover">
                </div>
                @endif
                <div class="p-3 w-full">
                    <div class="flex w-full">
                        <div class="rounded-full overflow-hidden">
                            <img src="{{asset($post->InCommunity->BannerPath)}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                        </div>
                        <span class=" px-2 my-auto font-semibold">{{$post->InCommunity->Name}}</span>
                        <div class=" px-2 my-auto font-semibold ml-auto">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->Title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden break-all" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        {{ $post->Description }}
                    </p>
                    <div class="text-white bg-transparent border-[1px] rounded-full flex justify-center px-3 py-1 w-16">
                        <i class='bx bxs-upvote text-xl text-white'></i>
                        <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                    </div>
                </div>
            </a>
            @empty
            <div class="flex items-center">
                <hr class="flex-1 border-t">
                <p class="mx-4">Wow so empty, be the first to post in this community</p>
                <hr class="flex-1 border-t">
            </div>
            @endforelse
            {{$posts->links()}}
        </div>
        <div class="sm:flex flex-col w-1/3 min-w-[260px] hidden">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top Communities</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Some of the highest followed Communities</p>
                    <div class="flex flex-col">
                    @foreach($topCommunities as $c)
                    <a href="{{url('community/' . $c->CommunityId)}}" class="flex gap-4 w-full items-center py-2">
                        <img src="{{asset($c->BannerPath)}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                        <div class="my-auto text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{$c->Name}}</div>
                    </a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6 w-full">
        <h1 class="w-full text-center text-3xl font-bold pb-4">Reccommended Posts</h1>
        <hr>
        <div class="flex flex-col gap-4 pt-4">
            @foreach ($recPosts as $rpost)
            <a href="{{url( '/post/' . $rpost->id)}}" class="flex w-full bg-gray-700 max-h-[250px] overflow-hidden rounded-xl">
                @if($rpost->ImagePath)
                <div class="min-w-[200px] w-[200px] overflow-hidden xl:block hidden">
                    <img src="{{ asset($rpost->ImagePath) }}" alt="noImage" class="h-full max-w object-cover">
                </div>
                @endif
                <div class="p-3 w-full">
                    <div class="flex w-full">
                        <div class="rounded-full overflow-hidden">
                            <img src="{{asset($rpost->InCommunity->BannerPath)}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                        </div>
                        <span class=" px-2 my-auto font-semibold">{{$rpost->InCommunity->Name}}</span>
                        <div class=" px-2 my-auto font-semibold ml-auto">{{$rpost->created_at->diffForHumans()}}</div>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $rpost->Title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden break-all" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        {{ $rpost->Description }}
                    </p>
                    <div class="text-white bg-transparent border-[1px] rounded-full flex justify-center px-3 py-1 w-16">
                        <i class='bx bxs-upvote text-xl text-white'></i>
                        <div class="text-white my-auto px-1 font-semibold">{{$rpost->UpvoteCount}}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
