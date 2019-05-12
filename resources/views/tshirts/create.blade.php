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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ Form::open( array('url' => 't-shirts', 'files' => true) ) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Product name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Product description') }}
                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('img_url', 'Product img_url') }}
                        {{ Form::text('img_url', null, array('class' => 'form-control')) }}
                    </div>

                    {{-- SIZES --}}

                    <div class="form-group">
                        {{ Form::label('size_s', 'size_s') }}
                        {{ Form::text('size_s', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('size_m', 'size_m') }}
                        {{ Form::text('size_m', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('size_l', 'size_l') }}
                        {{ Form::text('size_l', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('size_xl', 'size_xl') }}
                        {{ Form::text('size_xl', null, array('class' => 'form-control')) }}
                    </div>
                        

                    {{-- <div class="form-group">
                        {{ Form::label('img_url', 'img_url') }}
                        {{ Form::file('img_url') }}
                    </div> --}}

                    {{ Form::submit('Done', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script src="../js/app.js"></script>
</body>
</html>