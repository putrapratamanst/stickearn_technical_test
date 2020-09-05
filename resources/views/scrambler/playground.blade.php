@extends('layouts.main')
@section('content')


<div class="preloader" style="display: none;">
    <div class="loading">
        <img src="{{ asset('assets/images/logo.gif') }}">
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:navy">
                    <img src="{{ asset('assets/images/logo.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                    MENU
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">History Game</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/" onclick="return confirm('Are you sure to quit the game?')">Quit Game</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

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
