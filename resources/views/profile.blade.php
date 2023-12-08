@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="w-full">
        <!-- Bagian Profile -->
        <div class="bg-gray-700 p-4 rounded-md mx-auto">
            <!-- Avatar -->
            <div class="flex items-center justify-center">
                <img src="#" class="w-16 h-16 rounded-full">
            </div>

            <!-- Form Profil -->
            <form class="mt-4">
                <div class="mb-4 bg-gray-600 p-2 rounded-md text-white">

                    <!-- Username -->
                    <div class="flex items-center">
                        <label for="username" class="mr-2">Username:</label>
                        <input type="text" id="username" name="username" class="border rounded-md p-1" value="jovan" disabled>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center mt-2">
                        <label for="email" class="mr-2">Email:</label>
                        <input type="email" id="email" name="email" class="border rounded-md p-1" value="valejov@ayam.com" disabled>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="flex items-center mt-2">
                        <label for="phone" class="mr-2">Nomor Telepon:</label>
                        <input type="tel" id="phone" name="phone" class="border rounded-md p-1">
                    </div>

                    <!-- Link LinkedIn -->
                    <div class="flex items-center mt-2">
                        <label for="linkedin" class="mr-2">LinkedIn:</label>
                        <input type="url" id="linkedin" name="linkedin" class="border rounded-md p-1">
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="col-span-2 flex mt-4 space-x-2">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Discard</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection
