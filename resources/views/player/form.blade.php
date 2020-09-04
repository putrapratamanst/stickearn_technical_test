@extends('layouts.main')

@section('content')

{{ Form::open(array('url' => 'player/create')) }}

<div id="form-player">
    <center>Please input username
        <br>
        {{ Form::text('username', '', ['required']) }}

        <br>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'margin:10px']) }}
    </center>
</div>


{{ Form::close() }}

@endsection
