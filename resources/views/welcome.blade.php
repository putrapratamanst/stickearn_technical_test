@extends('layouts.main')
@section('content')


<div class="preloader">
    <div class="loading">
        <img src="{{ asset('assets/images/logo.gif') }}">
    </div>
</div>

<h3 style="text-align: center;">Stickearn Technical Test </h3>
<h5 style="text-align: center;">(Word Scrambler)</h5>

<p style="text-align: center;">
    <img src="{{ asset('assets/images/logo.jpg') }}" width="350" height="350" ">
    <span style=" font-family: 'Nunito Sans' ;font-size: 22px;"> Click <a href="/player/create" class="btn btn-dark blink">PLAY</a> To Start the Game</span>

</p>


@endsection
