<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | FashionStore</title>

    <meta name="description" content="Assignment made by Alessandro Picci for 21iLAB">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

</head>
    <body>

        @include('includes.navbar')

        <section id="dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Manage Products</h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="/dashboard/t-shirts">
                            <div class="category_card">
                                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1100&q=80" />
                                <div class="layer">
                                </div>
                                <h2>Manage T-Shirts</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="/dashboard/trousers">
                            <div class="category_card">
                                <img src="https://images.unsplash.com/photo-1488149156622-5cbca3b2b0db?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=987&q=80" />
                                <div class="layer">
                                </div>
                                <h2>Manage Trousers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="/dashboard/coats">
                            <div class="category_card">
                                <img src="https://images.unsplash.com/photo-1539533018447-63fcce2678e3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=668&q=80" />
                                <div class="layer">
                                </div>
                                <h2>Manage Coats</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <script src="../js/app.js"></script>
        <script src="/js/dashboard.js"></script>
    </body>
</html>