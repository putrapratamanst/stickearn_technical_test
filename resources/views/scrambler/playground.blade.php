@extends('layouts.main')
@section('content')


<div class="preloader" style="display: none;">
    <div class="loading">
        <img src="{{ asset('assets/images/logo.gif') }}">
    </div>
</div>
@include('layouts.navbar')
<div class="gameArea">
    <h3 style="color:navy">
        SCORE:<span id="score"></span>
    </h3>
    <div id="form-player" class="form-player">
        <h4 style="text-align:center;padding-bottom: 27px;">GUESS THE WORD:
            <span id="scramble-word">(KATA)</span>
        </h4>
        <center>
            {{ Form::open(array('url' => 'player/create', 'id' => 'form-playground')) }}
            {{ Form::text('guess_word', '', ['required']) }}

            {{ Form::submit('GUESS', ['id' => 'guess', 'class' => 'btn btn-stickearn', 'style' => 'margin:57px']) }}

            {{ Form::close() }}
        </center>
    </div>
    <div class="form-guess d-none">
        <h4 style="text-align:center;padding-bottom: 27px;">
            <span id="res_message"></span>
        </h4>
        <center>
            <button class="btn btn-stickearn" id="next">NEXT</a>
        </center>
    </div>
</div>
@endsection
