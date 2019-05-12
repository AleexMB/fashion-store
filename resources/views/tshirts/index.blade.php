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

        <section id="dashboard_grid">
            <div class="container">
                <div class="row">
                    @foreach ($tShirts as $tShirt)
                        <div class="col-3 dashboard_card">
                            <img src="{{$tShirt->img_url}}" title="{{$tShirt->name}}" alt="{{$tShirt->description}}" />
                            <h3>{{$tShirt->name}}</h3>
                            <h4>{{$tShirt->ref_id}}</h4>

                            <h5>Stock: </h5>
                            <h6>S: {{$tShirt->size_s}}</h6>
                            <h6>M: {{$tShirt->size_m}}</h6>
                            <h6>L: {{$tShirt->size_l}}</h6>
                            <h6>XL: {{$tShirt->size_xl}}</h6>

                            <div class="actions">
                                <a class="btn btn-small btn-info" href="{{ URL::to('t-shirts/' . $tShirt->ref_id . '/show') }}">Detail</a>

                                <a class="btn btn-small btn-info" href="{{ URL::to('t-shirts/' . $tShirt->ref_id . '/edit') }}">Edit</a>
                                
                                {{ Form::open(array('url' => 't-shirts/' . $tShirt->_id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        <script src="../js/app.js"></script>
    </body>
</html>