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
        <div class="col-xs-1 col-md-2"></div>
        <div class="col-xs-11 col-md-8">
            <div class="alert alert-success alert-dismissible {{$alert['success']['show'] or ''}}" role="alert">
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
        <div class="col-xs-1 col-md-2"></div>
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
