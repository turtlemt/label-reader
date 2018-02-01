
@extends('layouts.default')

@section('title', 'Scanner')

@section('content')
    <form method="post">
        {{ csrf_field() }}
        <table class="table table-hover col-xs-12 col-md-6">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>英</th>
                    <th>中</th>
                    <th>Play</th>
                </tr>
            </thead>
        @foreach ($voices as $key => $voice)
            @if (0 === $key % 10 && 0 !== $key)
            </table>
            <table class="table table-hover col-xs-12 col-md-6">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>英</th>
                        <th>中</th>
                        <th>Play</th>
                    </tr>
                </thead>
            @endif

            <tbody>
                <tr>
                    <th>{{$voice->id}}<?php echo DNS1D::getBarcodeHTML('10000' . $voice->id, 'C128A');?></th>
                    <th>{{$voice->text_en}}</th>
                    <th>{{$voice->text_tw}}</th>
                    <th>
                        <audio controls>
                            <source src="storage/voice/{{$voice->file_en}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </th>
                </tr>
            </tbody>
        @endforeach
        </table>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">English</span>
            <input type="text" class="form-control" placeholder="English" aria-describedby="basic-addon1" name="en">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Chinese</span>
            <input type="text" class="form-control" placeholder="Chinese" aria-describedby="basic-addon1" name="tw">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
