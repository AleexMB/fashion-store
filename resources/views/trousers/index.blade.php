<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Manage Trousers | FashionStore</title>

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

        <section id="dashboard_main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="/dashboard/t-shirts">T-shirts</a> | 
                        <a href="/dashboard/trousers" class="selected">Trousers</a> | 
                        <a href="/dashboard/coats">Coats</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Manage Trousers</h1>
                    </div>
                </div>
            </div>
        </section>

        <section id="dashboard_grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-3 col-sm-6 col-10 offset-1 offset-sm-0">
                        <a href="/dashboard/trousers/create">
                            <div class="dashboard_card new">
                                <img src="/images/plus.jpg" />
                                <div class="info">
                                    <h3>Add new Trousers</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    @foreach ($trousers as $trouser)
                        <div class="col-lg-4 col-xl-3 col-sm-6 col-10 offset-1 offset-sm-0">
                            <div class="dashboard_card">
                                <img src="/assets/trousers/{{$trouser->img}}" title="{{$trouser->name}}" alt="{{$trouser->description}}" />
                                <div class="info">
                                    <h3>{{$trouser->name}}</h3>
                                    <h4>ref {{$trouser->ref_id}}</h4>

                                    <h6>S: <span>{{$trouser->size_s}}</span></h6>
                                    <h6>M: <span>{{$trouser->size_m}}</span></h6>
                                    <h6>L: <span>{{$trouser->size_l}}</span></h6>
                                    <h6>XL: <span>{{$trouser->size_xl}}</span></h6>

                                    <div class="actions">
                                        <a class="dashboard_action" href="{{ URL::to('dashboard/trousers/' . $trouser->ref_id . '/show') }}">Detail</a>

                                        <a class="dashboard_action" href="{{ URL::to('dashboard/trousers/' . $trouser->ref_id . '/edit') }}">Edit</a>
                                        
                                        {{ Form::open(array('url' => 'dashboard/trousers/' . $trouser->_id, 'class' => 'delete')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'dashboard_action')) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('includes.footer')
        
        <script src="../js/app.js"></script>
        <script src="../js/dashboard.js"></script>
    </body>
</html>