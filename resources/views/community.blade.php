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
                <a href="{{url('unfollow/'. $community->CommunityId)}}" class=" text-white bg-gray-400 rounded-full flex justify-center px-2 py-1">
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
                <form action="{{ route('communityPage', ['communityId' => $community->CommunityId]) }}" method="GET">   
                    <div class=" flex flex-col gap-3">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" name="search" value="{{ $searchTerm }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Posts in {{$community->Name}}">
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                        <div class="flex gap-2 justify-end">
                            <div class="my-auto">Sort By:</div>
                            <select name="sort" class="bg-gray-50 w-[100px] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($sortOptions as $key => $label)
                                    <option value="{{ $key }}" {{ $key == $sortField ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <select name="direction" class="bg-gray-50 w-[75px] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="desc" {{ $sortDirection == 'desc' ? 'selected' : '' }} >desc</option>
                                <option value="asc" {{ $sortDirection == 'asc' ? 'selected' : '' }}>asc</option>
                            </select>
                        </div>
                    </div>
                </form>
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
                                <img src="{{asset('storage/images/avatar/defaultAvatar.jpg')}}" alt="no image" class="object-cover w-[30px] h-[30px] rounded-[100%]">
                            </div>
                            <span class=" px-2 my-auto font-semibold">{{$post->PostedBy->username}}</span>
                            <div class=" px-2 my-auto font-semibold ml-auto">{{$post->created_at->diffForHumans()}}</div>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->Title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden break-all" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                            {{ $post->Description }}
                        </p>
                        <div class="flex gap-4">
                            <div class="text-white bg-transparent border-[1px] rounded-full flex justify-center px-3 py-1 w-16">
                                <i class='bx bxs-upvote text-xl text-white'></i>
                                <div class="text-white my-auto px-1 font-semibold">{{$post->UpvoteCount}}</div>
                            </div>
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
    </div>
@endsection
