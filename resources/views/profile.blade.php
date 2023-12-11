@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="w-full">
        <!-- Bagian Profile -->
        <div class="bg-gray-700 p-4 rounded-md mx-auto flex flex-col">
            <div>
                <h2>Account</h2>
                <h3>Edit your profile</h3>
            </div>
            
            <div class="flex w-full h-[600px]">
                <div class="flex items-center justify-center bg-blue w-[20%] flex-col mx-3">
                     <!-- Avatar -->
                    <div>
                        <img src="#" class="w-16 h-16 rounded-full">
                    </div>

                    <!--Button-->
                    <div class="mt-4 flex flex-col">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change Avatar</button>

                        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete Avatar</button>
                    </div>
                </div>
    
                <!-- Form Profil -->
                <form class="mt-4 w-[75%] flex flex-col">
                    <div class="mb-4 bg-blue-700 p-2 rounded-m text-white h-[400px] flex">
                        <div class="px-5 py-5">
                            <!-- Name -->
                            <div class="flex flex-col">
                                <label for="name" class="mr-2">Name</label>
                                <input type="text" id="name" name="name" class="border rounded-md px-2 py-1 mt-2" value="kontol" disabled>
                            </div>
    
                            <!-- Username -->
                            <div class="flex flex-col mt-5">
                                <label for="username" class="mr-2">Username</label>
                                <input type="text" id="username" name="username" class="border rounded-md px-2 py-1 mt-2" value="kontolpecah" disabled>
                            </div>
    
                            <!-- Nomor Telepon -->
                            <div class="flex flex-col mt-5">
                                <label for="email" class="mr-2">Email</label>
                                <input type="email" id="email" name="email" class="border rounded-md px-2 py-1 mt-2" value="kontolkutrapesium@gmail.com" disabled>
                            </div>
                            
                            <!-- DOB -->
                            <div class="flex flex-col mt-5">
                                <label for="date" class="mr-2">Date of Birth</label>
                                <input type="date" id="username" name="username" class="border rounded-md px-2 py-1 mt-2" value="kontolpecah">
                            </div>

                        </div>

                        <div class="px-5 py-5">
                            <!--Password-->
                            <div class="flex flex-col">
                                <label for="password" class="mr-2">Password</label>
                                <input type="password" id="password" name="password" class="border rounded-md px-2 py-1 mt-2" value="kontolnyaberapa" disabled>
                            </div>
    
                            <!-- Location -->
                            <div class="flex flex-col mt-5">
                                <label for="location" class="mr-2">Location</label>
                                <input type="text" id="location" name="location" class="border rounded-md px-2 py-1 mt-2" value="Zimbabwe" disabled>
                            </div>
    
                            <!-- Favorite Category -->
                            <div class="flex flex-col mt-5">
                                <label for="category" class="mr-2">Favorite Category</label>
                                <input type="text" id="category" name="category" class="border rounded-md px-2 py-1 mt-2" value="Porn" disabled>
                            </div>
    
                            <!-- Location -->
                            <div class="flex flex-col mt-5">
                                <label for="location" class="mr-2">Location</label>
                                <input type="text" id="location" name="location" class="border rounded-md p-1 mt-2" value="Zimbabwe" disabled>
                            </div>
                        </div>

                        <div class="px-5 py-5">
                            <div class="max-w-sm mx-auto">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                            </div>
                        </div>
                    </div>
    
                    <!-- Tombol Submit -->
                    <div class="col-span-2 mt-4 space-x-2 bg-yellow-50">
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Discard</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
