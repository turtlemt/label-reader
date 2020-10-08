
@extends('layouts.default')

@section('title', 'Builder')

@section('content')
    <form method="post">
        {{ csrf_field() }}
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
