@extends('layout')

@section('title','Popular')

@section('content')

<div class="">
    <h1 class="text-center">Create a New Post in {{$community->Name}}</h1>
    <div class="flex justify-center">
        <form class="space-y-4 md:space-y-6 w-[35rem]" action="{{ route('createPostForm', ['communityId' => $community->CommunityId]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-1/2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                <input type="text" id="title" name="title" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Description</label>
                <input type="text" id="description" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>          
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload File(optional)</label>
            <input name="file_input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-700 focus:ring-blue-800">Create</button>
        </form>
    </div>
</div>

@endsection