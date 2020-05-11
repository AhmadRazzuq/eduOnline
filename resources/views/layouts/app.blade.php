<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    {{--                        <li class="nav-item active">--}}
                    {{--                            @if (auth()->user()->hasRole('n_user') != null)--}}
                    {{--                                <a class="dropdown-item" href="{{route('courses.index')}}">--}}
                    {{--                                    Add new course--}}
                    {{--                                </a>--}}
                    {{--                            @endif--}}
                    {{--                        </li>--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                @if ((auth()->user()->hasRole('n_user') != null) OR (auth()->user()->hasRole('admin_user') != null))
                                    <a class="dropdown-item" href="{{route('users.courses')}}">
                                        View courses
                                    </a>
                                @endif
                            </li>
                        </ul>
                        @if (auth()->user()->hasRole('admin_user') != null)
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                    <a class="dropdown-item" href="{{route('users')}}">
                                        view users
                                    </a>
                            </li>
                            <li class="nav-item active">
                                    <a class="dropdown-item" href="{{route('courses')}}">
                                        view courses as Admin
                                    </a>
                            </li>
                            <li class="nav-item active">

                                    <a class="dropdown-item" href="{{route('admin.index')}}">
                                        Dashboard
                                    </a>
                            </li>
                        </ul>
                    @endif
                        @if ((auth()->user()->hasRole('teacher') != null) OR(auth()->user()->hasRole('admin_user') != null))
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="dropdown-item" href="{{route('courses.teacher.newCourse')}}">
                                        Add new course
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="dropdown-item" href="{{route('courses.teacher.teacherCourse')}}">
                                        View my courses
                                    </a>
                                </li>
                            </ul>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
