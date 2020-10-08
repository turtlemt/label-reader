<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>

</head>

<body>
    @section('alert')
    <div class="col-xs-1 col-md-1"></div>
    <div class="col-xs-10 col-md-10">
        <div class="alert alert-success alert-dismissible {{$alert['success']['show'] or 'hide'}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$alert['success']['content'] or ''}}
        </div>
        <div class="alert alert-info alert-dismissible {{$alert['info']['show'] or 'hide'}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$alert['info']['content'] or ''}}
        </div>
        <div class="alert alert-warning alert-dismissible {{$alert['warning']['show'] or 'hide'}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$alert['warning']['content'] or ''}}
        </div>
        <div class="alert alert-danger alert-dismissible {{$alert['danger']['show'] or 'hide'}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$alert['danger']['content'] or ''}}
        </div>
    </div>
    <div class="col-xs-12 col-md-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="voicebuild">Create Label</a></li>
                        <li><a href="voicelist">Print Label</a></li>
                        <li><a href="scanner">Scan</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    @show
    <div class="container">
        @yield('content')
    </div>
</body>

</html>