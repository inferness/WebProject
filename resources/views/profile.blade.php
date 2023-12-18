@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="w-full max-w-6xl flex flex-col justify-center mx-auto">      
        <!-- Bagian Profile -->
        <div class="bg-gray-700 p-[35px] rounded-md mx-auto flex flex-col w-full h-full">
            <form action="{{route('profileForm')}}" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col">
                    <div class="flex gap-5">
                        <img class="rounded-[100%] w-[100px] h-[100px] drop-shadow-xl border-2" src="{{Asset ($user->AvatarPath)}}" alt="image description">
                        <div class="my-auto text-2xl">
                            <div>{{$user->username}}</div>
                            <div class="text-sm">Joined on {{$user->JoinDate}}</div>
                        </div>
                    </div> 
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar</label>
                        <input name="file_input" class="block text-sm w-[200px] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>
                </div>        
                <div class="w-full">
                    <div class="rounded-m">                    
                        @csrf
                        <div class="py-5">
                            <div class="flex w-full">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Name</label>
                                </div>
                                <div class="w-full text-black">
                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="border rounded-md px-2 py-1 w-full">
                                </div>
                            </div>
                            <div class="flex w-full">
                                <div class="w-full text-black">
                                    <input type="text" id="username" name="username" value="{{$user->username}}" class="border rounded-md px-2 py-1 w-full hidden">
                                </div>
                            </div>
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Email</label>
                                </div>
                                <div class="w-full text-black">
                                    <input type="email" id="email" name="email" value="{{$user->email}}" class="border rounded-md px-2 py-1 w-full" disabled>
                                </div>
                            </div>                                
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Date of Birth</label>
                                </div>
                                <div class="w-full text-black">
                                    <input type="date" id="DOB" name="DOB" value="{{$user->dateOfBirth}}" class="border rounded-md px-2 py-1 w-full">
                                </div>
                            </div>
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Description</label>
                                </div>
                                <div class="w-full text-black">
                                    <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{$user->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 mt-4 space-x-2 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Edit Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <h1 class="text-3xl w-full text-center py-3">Your Communities</h1>
        <hr>
        <div class="flex gap-5 w-full justify-center flex-wrap mt-5">
            @forelse( $ownedCommunities as $community )
            <div  class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-80">
                <div class="h-[200px]">
                    <a href="{{ route('communityPage', ['communityId'=>$community->CommunityId]) }}" class="h-[150px] w-auto object-cover overflow-hidden">
                        <img class="rounded-t-lg h-full w-auto object-cover" src="{{asset($community->BannerPath)}}" alt="" />
                    </a>
                </div>
                <a href="{{ route('communityPage', ['communityId'=>$community->CommunityId]) }}" class="p-5">
                    <h5 class=" pl-5 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$community->Name}}</h5>
                    <p class=" pl-5 mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden h-[72px]" style="text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$community->Description}}</p>
                </a>
                <div class="p-4 text-center">
                    <a href="{{route('deleteCommunity', ['communityId'=>$community->CommunityId])}}" class="z-20 bg-red-500 py-2 px-4 rounded-xl">Delete</a>
                </div>
            </div>
            @empty
            <div class="flex items-center">
                <hr class="flex-1 border-t">
                <p class="mx-4">No communities found</p>
                <hr class="flex-1 border-t">
            </div>
            @endforelse
        </div>
    </div>
@endsection
