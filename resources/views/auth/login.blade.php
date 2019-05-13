<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FashionStore</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

</head>
    <body>

        {{-- <nav>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <a href="/">Dashboard</a>
                    </div>

                    <div class="col-6 text-right">
                        <a href="/">Log out</a>
                    </div>
                </div>
            </div>
        </nav> --}}

        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    <div class="col-sm-6 col-8 offset-sm-3 offset-2">

                        <div class="card_login">

                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password" class="">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="login_btn">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <script src="../js/app.js"></script>
        <script src="../js/dashboard.js"></script>
    </body>
</html>