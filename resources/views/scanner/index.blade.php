
@extends('layouts.default')

@section('title', 'Scanner')

@section('content')
    <form method="post" target="/">
        {{ csrf_field() }}
        <input name="scan"/>
        <button type="submit">Submit</button>
    </form>
    <p>{{$audio}}</p>
    <audio controls autoplay>
        <source src="{{$audio}}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
@endsection
