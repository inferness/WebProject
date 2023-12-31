@extends('layout')

@section('title','Popular')

@section('content')

<div class="h-screen flex flex-col pt-11">
    <h1 class="text-center text-xl font-semibold">Create a New Community</h1>
    <div class="flex justify-center">
        <form class="space-y-4 md:space-y-6 w-[35rem]" action="{{url('createCommunityForm')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-1/2">
                <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Community Name</label>
                <input type="text" value="{{ old('Name') }}" id="Name" name="Name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('Name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Description</label>
                <textarea id="Description" name="Description" class="block w-full h-40 p-4 border rounded-lg sm:text-md bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">{{ old('Description') }}</textarea>
                @error('Description')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>         
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Banner</label>
            <input name="file_input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            @error('file_input')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
            <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-700 focus:ring-blue-800">Create</button>
        </form>
    </div>
</div>

@endsection