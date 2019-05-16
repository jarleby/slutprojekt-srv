<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sebblogg')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="/">Sebblogg</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">{{ __('Home') }}</a>
                </li>
                @auth
                    <li class="nav-item active">
                        <a href="{{ route('posts.index') }}" class="nav-link">{{ __('Show Posts') }}</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('posts.create') }}">{{ __('Create Post') }}</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{ route('users.show', auth()->user()->username) }}">{{ __(auth()->user()->username) }}</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item active">
                        <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                    </li>
                @endauth
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit" disabled>Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>