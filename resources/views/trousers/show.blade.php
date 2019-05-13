<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trousers Detail | FashionStore</title>

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

        <section id="dashboard_detail">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="/dashboard/trousers" class="selected">Back to Trousers</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>{{$trousers->name}} in detail</h1>
                    </div>
                    <div class="col-md-4 col-12 offset-0">
                        <img src="/assets/trousers/{{$trousers->img}}" title="{{$trousers->name}}" alt="{{$trousers->description}}" />
                    </div>
                    <div class="col-md-6 offset-md-2 col-12 offset-0">
                        <h2>{{$trousers->name}}</h2>
                        <h4>ref {{$trousers->ref_id}}</h4>

                        <h6>S: <span>{{$trousers->size_s}}</span></h6>
                        <h6>M: <span>{{$trousers->size_m}}</span></h6>
                        <h6>L: <span>{{$trousers->size_l}}</span></h6>
                        <h6>XL: <span>{{$trousers->size_xl}}</span></h6>

                        <p>{{$trousers->description}}</p>

                        <div class="actions">
                            <a class="dashboard_action" href="{{ URL::to('dashboard/trousers/' . $trousers->ref_id . '/edit') }}">Edit</a>
                            
                            {{ Form::open(array('url' => 'dashboard/trousers/' . $trousers->_id, 'class' => 'delete')) }}
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