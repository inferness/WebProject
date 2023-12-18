<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="bg-gray-900">   
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class=" flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                CommonGrounds
            </a>
            <div class="flex flex-row h-1/2 bg-white rounded-[30px] shadow dark:border w-auto lg:max-w-4xl dark:bg-gray-800 dark:border-gray-700">
                <div class="md:w-70 p-6 space-y-6 md:space-y-6 w-full md:min-w-[400px] lg:w-1/2">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-6" action="{{url('processLogin')}}" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex justify-end">
                            <a href="#" class="text-sm font-medium hover:underline text-blue-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-700 focus:ring-blue-800">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="{{url('register')}}" class="font-medium text-blue-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>                
                </div>
                <div class="w-1/2 p-4 hidden lg:block">
                    <div class="bg-gray-700 w-full rounded-[20px] h-full overflow-hidden">
                        <img src="{{ asset('images/default/LoginBanner.jpg') }}" alt="asdasd" class="h-full w-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
