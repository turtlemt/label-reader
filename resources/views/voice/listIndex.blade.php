
@extends('layouts.default')

@section('title', 'List')

@section('content')
    <form method="get" action="/voicelist/create">
        {{ csrf_field() }}
        <div class="col-xs-12 col-md-12">
            <button type="submit">Submit</button>
        </div>
        <div class="col-xs-12 col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>英</th>
                        <th>中</th>
                        <th>Play</th>
                    </tr>
                </thead>
            @foreach ($voices as $key => $voice)
                @if (0 === $key % 10 && 0 !== $key)
                </table>
            </div>
            <div class="col-xs-12 col-md-6">
                <table class="table table-hover col-xs-12 col-md-6">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>英</th>
                            <th>中</th>
                            <th>EN Play</th>
                            <th>TW Play</th>
                        </tr>
                    </thead>
                @endif

                <tbody>
                    <tr>
                        <th><input type="checkbox" name="checklabel[]" value="{{$voice->id}}"></th>
                        <th>{{$voice->id}}<?php echo DNS1D::getBarcodeHTML($voice->barcode, 'C128', 1, 33);?></th>
                        <th>{{$voice->text_en}}</th>
                        <th>{{$voice->text_tw}}</th>
                        <th>
                            <audio controls>
                                <source src="storage/voice/{{$voice->file_en}}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </th>
                        <th>
                            <audio controls>
                                <source src="storage/voice/{{$voice->file_tw}}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </th>
                    </tr>
                </tbody>
            @endforeach
            </table>
        </div>
    </form>
@endsection
