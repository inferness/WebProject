@extends('layout')

@section('title','home')

@section('content')
    <div class="max-w-7xl mx-auto">
        <img class="h-[330px] w-full object-cover rounded-2xl" src="{{ asset('images/default/defaultSavedBanner.jpg') }}" alt="image description">
        <div class="text-center mb-4 pt-5">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Saved Posts</h2>
        </div> 
        <div class="flex gap-5 w-full justify-center">
            <div class="flex flex-col gap-4 w-full max-w-[945px]">
                @forelse ($savedPosts as $post)
                <a href="{{url( '/post/' . $post->Posts->id)}}" class="flex bg-gray-700 max-h-[250px] overflow-hidden rounded-xl w-full">
                    @if($post->Posts->ImagePath)
                    <div class="min-w-[200px] w-[200px] overflow-hidden xl:block hidden">
                        <img src="{{ asset($post->Posts->ImagePath) }}" alt="" class="h-full max-w object-cover">
                    </div>
                    @endif
                    <div class="p-3 w-full">
                        <div class="flex w-full">
                            <div class="rounded-full overflow-hidden">
                                <img src="{{asset($post->Posts->InCommunity->BannerPath)}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                            </div>
                            <span class=" px-2 my-auto font-semibold">{{$post->Posts->InCommunity->Name}}</span>
                            <div class=" px-2 my-auto font-semibold ml-auto">{{$post->Posts->created_at->diffForHumans()}}</div>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->Posts->Title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden break-all" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                            {{ $post->Posts->Description }}
                        </p>
                        <div class="flex gap-4">
                            <div class="text-white bg-transparent border-[1px] rounded-full flex justify-center px-3 py-1 w-16">
                                <i class='bx bxs-upvote text-xl text-white'></i>
                                <div class="text-white my-auto px-1 font-semibold">{{$post->Posts->UpvoteCount}}</div>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="flex items-center">
                    <hr class="flex-1 border-t">
                    <p class="mx-4">You dont have any saved posts</p>
                    <hr class="flex-1 border-t">
                </div>
                @endforelse
                {{$savedPosts->links()}}
            </div>
        </div>
    </div>
@endsection
