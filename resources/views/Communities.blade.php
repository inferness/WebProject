@extends('layout')

@section('title','home')

@section('content')
    <div class="max-w-7xl mx-auto">
        <img class="h-[330px] w-full object-cover rounded-2xl" src="{{ asset('images/default/defaultSavedBanner.jpg') }}" alt="image description">
        <div class="text-center mb-4 pt-5">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Browse Communities</h2>
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
