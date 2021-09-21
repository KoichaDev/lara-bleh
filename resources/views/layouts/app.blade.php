<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>

            <li>
                <a href="{{ route('posts') }}" class="p-3">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            {{-- // We can use this auth() -> user() to check if the user is authenthicated --}}
            {{-- @if (auth()->user()) --}}

            {{-- or we can use this alternative below --}}
            {{-- @if (auth()->check()) --}}

            {{-- Or EVEN BETTER SOLUTION --}}
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>

                    {{-- <a href="" class="p-3">Alex Garrett-Smith</a> --}}
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post"
                          class="inline p-3">
                        {{-- Since this is a form wth a method of post, we have to include the cross site request forgery protection --}}
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    {{-- using route() is much easier to map your route than hardcoding the url link.
                    Check the URL here for more info: https://youtu.be/MFh0Fd7BsjE?t=1585 --}}
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>

</html>
