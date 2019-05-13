<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <nav>
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
        </nav>

        <section id="dashboard_detail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="/dashboard/t-shirts" class="selected">Back to T-shirts</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>{{$tShirt->name}} in detail</h1>
                    </div>
                    <div class="col-4">
                        <img src="/assets/tshirts/{{$tShirt->img}}" title="{{$tShirt->name}}" alt="{{$tShirt->description}}" />
                    </div>
                    <div class="col-6 offset-2">
                        <h2>{{$tShirt->name}}</h2>
                        <h4>ref {{$tShirt->ref_id}}</h4>

                        <h6>S: <span>{{$tShirt->size_s}}</span></h6>
                        <h6>M: <span>{{$tShirt->size_m}}</span></h6>
                        <h6>L: <span>{{$tShirt->size_l}}</span></h6>
                        <h6>XL: <span>{{$tShirt->size_xl}}</span></h6>

                        <p>{{$tShirt->description}}</p>

                        <div class="actions">
                            <a class="dashboard_action" href="{{ URL::to('dashboard/t-shirts/' . $tShirt->ref_id . '/edit') }}">Edit</a>
                            
                            {{ Form::open(array('url' => 'dashboard/t-shirts/' . $tShirt->_id, 'class' => 'delete')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'dashboard_action')) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>

            </div>
        </section>

        @include('includes.footer')

        <script src="/js/app.js"></script>
        <script src="/js/dashboard.js"></script>
    </body>
</html>