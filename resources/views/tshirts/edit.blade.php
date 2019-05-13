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

    <section id="dashboard_create">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="/dashboard/t-shirts" class="selected">Back to T-shirts</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Edit the T-shirt</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ Form::model($tShirt, array('route' => array('t-shirts.update', $tShirt->ref_id), 'method' => 'PUT', 'files' => true)) }}
                    <div class="row">
                        <div class="col-12">
                            <h3>Info</h3>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Product name *') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('ref_id', 'Product ref id * (must be unique)') }}
                                {{ Form::text('ref_id', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                {{ Form::label('description', 'Product description') }}
                                {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('img', 'Product image') }}
                                <br/>
                                {{ Form::file('img') }}
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('img_url', 'Product img_url') }}
                                {{ Form::text('img_url', null, array('class' => 'form-control')) }}
                            </div>
                        </div> --}}

                        {{-- SIZES --}}
                        <div class="col-12">
                            <h3>Quantity in stock</h3>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {{ Form::label('size_s', 'S size') }}
                                {{ Form::text('size_s', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                {{ Form::label('size_m', 'M size') }}
                                {{ Form::text('size_m', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                {{ Form::label('size_l', 'L size') }}
                                {{ Form::text('size_l', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                {{ Form::label('size_xl', 'XL size') }}
                                {{ Form::text('size_xl', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                                
                        <div class="col-12">
                            {{ Form::submit('Save', array('class' => 'create_btn')) }}
                        </div>

                        <div class="col-12">
                            <h6>fields with a * are required</h6>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.footer')

    <script src="/js/app.js"></script>
</body>
</html>