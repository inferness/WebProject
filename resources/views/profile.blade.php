@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="w-full items-center justify-center">
        
        <!-- Bagian Profile -->
        <div class="flex">
            <div class="bg-gray-700 p-[40px] rounded-md mx-auto flex flex-col w-[60%] h-full">
                <div>
                    <h4 class="text-2xl font-bold dark:text-white">Personal</h4>
                </div>

                <div class="mt-4">
                    <p>Edit your Personal Information.</p>

                    <hr class="h-px mt-8 bg-gray-200 border-0 dark:bg-gray-500">
                </div>
                
                <div class="w-full">
                    <div class="mb-4 px-10 rounded-m text-white h-[400px]">
                        <div class="py-5">
                            
                            <!-- Name -->
                            <div class="flex w-full">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Name</label>
                                </div>

                                <div class="w-full">
                                    <input type="text" id="name" name="name" class="border rounded-md px-2 py-1 w-full" value="kontolpecah" disabled>
                                </div>
                            </div>
        
                            <!-- Username -->
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Username</label>
                                </div>

                                <div class="w-full">
                                    <input type="text" id="username" name="username" class="border rounded-md px-2 py-1 w-full" value="kontolpecah" disabled>
                                </div>
                            </div>
        
                            <!-- Email -->
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Email</label>
                                </div>

                                <div class="w-full">
                                    <input type="email" id="email" name="email" class="border rounded-md px-2 py-1 w-full" value="kontolpecah" disabled>
                                </div>
                            </div>
                                
                            <!-- DOB -->
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Date of Birth</label>
                                </div>

                                <div class="w-full">
                                    <input type="date" id="date" name="date" class="border rounded-md px-2 py-1 w-full">
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Location</label>
                                </div>

                                <div class="w-full">
                                    <input type="text" id="text" name="text" class="border rounded-md px-2 py-1 w-full">
                                </div>
                            </div>

                            <!-- Favortie Category -->
                            <div class="flex w-full mt-[25px]">
                                <div class="w-[30%] mr-5">
                                    <label for="name">Favorite Category</label>
                                </div>

                                <div class="w-full">
                                    <input type="text" id="text" name="text" class="border rounded-md px-2 py-1 w-full">
                                </div>
                            </div>
                            
                        </div>
        
                        <!-- Tombol Submit -->
                        <div class="col-span-2 mt-4 space-x-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Edit Profile</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mr-[5%] bg-gray-700 w-[25%] px-[35px] h-[550px] rounded-md">
                <div class="mt-5">
                    <h4 class="text-2xl font-bold dark:text-white">My Profile Picture</h4>

                    <div class="mt-2">
                        <p>Insert your best profile picture :3</p>
                    </div>

                    <div class="flex mt-10 justify-center w-full h-[150px]">
                        <a href=""><img class="rounded-full w-40 h-40 drop-shadow-xl border-2" src="{{Asset ('/images/test.jpg')}}" alt="image description"></a>
                    </div>

                    <div class="flex mt-10 justify-center">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Choose image</button>
                    </div>

                    <div class="mt-5">
                        <div class="max-w-sm mx-auto">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                            
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex: My name is Axel, i love Caroline 8==D."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
