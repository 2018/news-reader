<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- Bootstrap CSS 4.1.1 -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
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
                    <p class="mt-5 mb-3 text-muted text-center">&copy; {{ config('app.name') }} @php echo date('Y'); @endphp</p>

                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </body>
</html>
