<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Blog')</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>

    <body>
        <div class="main">
            <div>
                <ul class="nav">
                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    @auth
                    <li><a class="{{ request()->routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">Create Post</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    <li class="username"><p>Logged in as: <b>{{ Auth::user()->name }}</b></p></li>
                    @else
                    <li><a class="{{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>
                    <li><a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
                
                @includeWhen($errors->any(), '_errors')

                @if (session('success'))
                    <div class="flash-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            @yield('content')
        </div>
    </body>
</html>