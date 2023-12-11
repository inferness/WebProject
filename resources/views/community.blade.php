@extends('layout')

@section('title','home')

@section('content')
    <div class="max-w-7xl mx-auto">
        <img class="h-[330px] w-full object-cover" src="{{ asset($community->BannerPath) }}" alt="image description">
        <div class="text-center mb-4 pt-5">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $community->Name }}</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">{{ $community->Description }}</p>
            <div class="p-5 flex justify-end gap-5">
                <a href="{{url( $community->CommunityId .'/createPost')}}" class="w-auto text-white bg-blue-600 rounded-full flex justify-center px-3 py-1">
                    <i class='bx bx-plus text-xl text-white'></i>
                    <div class="text-white my-auto px-1 font-semibold">Post</div>
                </a>
                @if($following)
                <a href="{{url('unfollow/'. $community->CommunityId)}}" class=" text-white bg-orange-600 rounded-full flex justify-center px-2 py-1">
                    <!-- <i class='bx bx-plus text-xl text-black'></i> -->
                    <div class="text-black my-auto px-1 font-semibold">Following</div>
                </a>
                @else
                <a href="{{url('follow/'. $community->CommunityId)}}" class=" text-white bg-orange-600 rounded-full flex justify-center px-2 py-1">
                    <!-- <i class='bx bx-plus text-xl text-black'></i> -->
                    <div class="text-black my-auto px-1 font-semibold">Follow</div>
                </a>
                @endif
            </div>
        </div> 
        <div class="flex gap-5 max-w-full">
            <div class="flex flex-col gap-4 w-full">
                @foreach ($posts as $post)
                <a href="{{url( '/post/' . $post->PostId)}}" class="flex w-full bg-gray-700 max-h-[250px] overflow-hidden rounded-xl max-w-[945px]">
                    <div class="min-w-[200px] w-[200px] overflow-hidden xl:block hidden">
                        <img src="{{ asset($post->ImagePath) }}" alt="" class="h-full max-w object-cover">
                    </div>
                    <div class="p-3 w-full">
                        <div class="flex w-full">
                            <div class="rounded-full overflow-hidden">
                                <img src="{{asset('storage/images/avatar/defaultAvatar.jpg')}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                            </div>
                            <span class=" px-2 my-auto font-semibold">{{$post->PostedBy->username}}</span>
                            <div class=" px-2 my-auto font-semibold ml-auto">{{$post->PostedAt}}</div>
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
                @endforeach
            </div>
            <div class="sm:flex flex-col w-1/3 min-w-[260px] hidden">
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top Communities</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
