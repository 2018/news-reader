<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Bootstrap CSS 4.1.1 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Left Side Of Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{ Html::bsMenu(
                        [
                            'news.index' => _i('News'),
                            'users.index' => _i('Users'),
                        ],
                        ['class' => 'navbar-nav mr-auto']
                    ) }}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav my-2 my-lg-0">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <button id="dropdownMenu" href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <li>
                                    <a class="dropdown-item" type="button" href="{{ route('logout') }}"
                                       onclick="document.getElementById('logout-form').submit(); return false;">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2>@yield('title')</h2>
                                <div>@yield('list_buttons')</div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
