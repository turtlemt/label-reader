
@extends('layouts.default')

@section('title', 'Scanner')

@section('content')
    <form method="post" id="js-form-main">
        {{ csrf_field() }}
        <input name="scan" id="js-input-scan"/>
        <button type="submit">Submit</button>
    </form>
    @if (isset($voice))
        <p>{{$voice->text_en}} {{$voice->text_tw}}</p>
        @if ('' != $voice->file_en)
        <audio controls autoplay>
            <source src="storage/voice/{{$voice->file_en}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        @endif
        <audio controls onloadeddata="var audioPlayer = this; setTimeout(function() { audioPlayer.play(); }, {{$voice->delay}})">
            <source src="storage/voice/{{$voice->file_tw}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @endif

    <script type='text/javascript'>
        $(document).ready(function (){
            $("#js-input-scan").focus();
        });

        $("#js-input-scan").change(function() {
            $("#js-form-main").submit();
        });
    </script>
@endsection
