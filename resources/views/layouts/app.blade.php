<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto">
                <div class="flex items-center justify-between py-4">
                    <a class="text-lg font-semibold text-blue-500" href="{{ url('/') }}">

                        <img src="images/logo.png" class="w-28 h-28" alt="" srcset="">
                    </a>
                    <button class="lg:hidden focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>

                    <!--                     
                    <div class="hidden lg:flex lg:items-center lg:w-auto">
                       
                        <ul class="flex items-center space-x-4">
                           
                            @guest
                            @if (Route::has('login'))
                            <li>
                                <a class="text-gray-800 hover:text-blue-500" href="{{ route('login') }}">{{ __('Login')
                                    }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li>
                                <a class="text-gray-800 hover:text-blue-500" href="{{ route('register') }}">{{
                                    __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="relative">
                                <button id="navbarDropdown" class="text-gray-800 hover:text-blue-500 focus:outline-none"
                                    @click="openDropdown = !openDropdown">
                                    {{ Auth::user()->name }}
                                </button>

                                <div x-show="openDropdown" @click.away="openDropdown = false"
                                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg" x-cloak>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white"
                                        href="#"
                                        onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div> -->

                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>