@extends('layout')

@section('title','home')

@section('content')
    <div class="max-w-7xl mx-auto">
        <img class="h-[330px] w-full object-cover rounded-2xl" src="{{ asset('images/default/defaultSavedBanner.jpg') }}" alt="image description">
        <div class="text-center mb-4 pt-5">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Browse Communities</h2>
        </div>
        <div class="max-w-5xl mx-auto w-full pb-4">
            <form action="{{route('communities')}}" method="GET">   
                <div class=" flex flex-col gap-3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" value="{{$searchTerm}}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Communities">
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex gap-5 w-full justify-center flex-wrap">
            @forelse( $communities as $community )
            <a href="{{ route('communityPage', ['communityId'=>$community->CommunityId]) }}" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-80">
                <div class="h-[150px] w-auto object-cover overflow-hidden">
                    <img class="rounded-t-lg" src="{{asset($community->BannerPath)}}" alt="" />
                </div>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$community->Name}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$community->Description}}</p>
                </div>
            </a>
            @empty
            <div class="flex items-center">
                <hr class="flex-1 border-t">
                <p class="mx-4">No communities found</p>
                <hr class="flex-1 border-t">
            </div>
            @endforelse
        </div>
    </div>
    <div class="p-4 max-w-6xl mx-auto">
        {{$communities->links()}}
    </div>
@endsection
