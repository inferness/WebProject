@extends('layout')

@section('title','home')

@section('content')
    <div class="max-w-7xl mx-auto">
        <img class="h-[330px] w-full object-cover" src="{{ asset($community->BannerPath) }}" alt="image description">
        <div class="mx-auto max-w-screen-sm text-center mb-4 pt-5">
          <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $community->Name }}</h2>
          <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">{{ $community->Description }}</p>
          <a href="{{url( $community->CommunityId .'/createPost')}}" class=" w-24 text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-700 focus:ring-blue-800">Create Post</a>
      </div> 
      <div class="flex gap-5">
            <div class="flex flex-col gap-4 w-full">
                @foreach ($posts as $post)
                <a href="#" class="flex w-full bg-gray-700 max-h-[150px] overflow-hidden rounded-xl">
                    <div class="min-w-[200px] w-[200px] overflow-hidden xl:block hidden">
                        <img src="{{ asset($post->ImagePath) }}" alt="" class="h-full max-w object-cover">
                    </div>
                    <div class="p-3">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->Title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                            {{ $post->Description }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="flex flex-col w-1/3 min-w-[260px]">
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
      </div>
    </div>
@endsection
