<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>
        @yield('title')
    </title>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="min-h-screen bg-gray-50/50">
        @include('layouts.incAdmin.sidebar')
        <div class="p-4 xl:ml-80">
            @include('layouts.incAdmin.adminnav')
            <div class="mt-12">
                @yield('content')
            </div>
            <div class="text-blue-gray-600">
                <!-- @include('layouts.incAdmin.adminfooter') -->
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>

    @endif
</body>

</html>