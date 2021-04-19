<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">
    <div class="flex-1 flex flex-col">
        <nav class="px-4 flex justify-between bg-white h-16 border-b-2">

            <!-- top bar left -->
            <ul class="flex items-center">
                <!-- add button -->
                <li class="h-6 w-6">

                </li>
            </ul>

            <ul class="flex items-center">
                <!-- add button -->
                <li>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        <h1 class="pl-8 lg:pl-0"> {{ config('app.name', 'Laravel') }}</h1>
                    </a>
                </li>
            </ul>

            <!-- to bar right  -->
            <ul class="flex items-center">

                <li class="pr-6">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-bell">
                        <path
                            d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </li>
                <li class="h-10 w-10">
                    <img
                        class="h-full w-full rounded-full mx-auto"
                        src="images/{{ Auth::user()->avatar }}"
                        alt="avatar"/>
                </li>
                <li class="h-10 w-10">
                    <span>{{ Auth::user()->nickname }}</span>
                </li>
                <li class="h-10 w-10">
                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>

        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
