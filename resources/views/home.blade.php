@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="w-11/12">
        <!-- buat ngepost -->
        <div class="bg-gray-700 p-4 rounded-md flex items-start mb-4 mx-auto">
            <textarea class="w-full h-12 border rounded-md p-1 flex-grow text-gray-800 font-light" placeholder="Create Post"></textarea>
            <button class="bg-blue-600 text-white px-5 py-3 rounded-md ml-4">Post</button>
        </div>

        <!-- ni buat postnya ntar tinggal di loop dr database -->
        <div class="bg-gray-700 p-4 rounded-md mx-auto">
            <div class="mb-4 bg-gray-600 p-2 rounded-md text-white">
                <div class="font-bold">Jovan</div>
                <div>Maaf ya Vale</div>
            </div>
            <div class="flex items-center mt-2">
                <button class="bg-green-500 text-white px-3 py-1 rounded-md mr-2">Upvote</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded-md">Downvote</button>
            </div>
        </div>
    </div>
@endsection
