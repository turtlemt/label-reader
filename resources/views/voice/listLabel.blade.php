
@extends('layouts.default')

@section('title', 'List')

@section('content')
    <form method="get" action="/voicelist/create">
        {{ csrf_field() }}
        <div class="col-xs-12 col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Label</th>
                        <th>Label</th>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voices as $key => $voice)
                        @if (0 === $key % 4)
                        <tr>
                        @endif
                            <th>
                                <div>
                                    <img src="data:image/png;base64,<?php echo DNS1D::getBarcodePNG($voice->barcode, "C128",2.5,38,array(1,1,1), true);?>" alt="barcode"/>
                                </div>
                                <div>{{$voice->text_en}}&nbsp;&nbsp;{{$voice->text_tw}}
                            </th>
                        @if (3 === $key % 4)
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
@endsection
