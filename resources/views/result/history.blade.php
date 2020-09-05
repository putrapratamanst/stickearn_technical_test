@extends('layouts.main')
@section('content')


<div class="preloader" style="display: none;">
    <div class="loading">
        <img src="{{ asset('assets/images/logo.gif') }}">
    </div>
</div>
@include('layouts.navbar')

<h4 style="text-align:center">History Game</h4>
<hr>
<div class="container mb-5" style=" overflow-y: scroll;">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <ul class="timeline">
                @foreach ($scores as $score)

                <li>
                    <a href="#" style="color:<?= $score->status == 0 ? "red" : "##0056b3" ?>">
                        {{ $score->status == 0 ? "INCORRECT" : "CORRECT" }}</a>
                    <a href="#" class="float-right">{{ $score->created_at }}</a>
                    <p>
                        Scramble Word: {{ $score->scramble_word}} <br>
                        Guess Word: {{ $score->answer}} <br>
                        Correct Word: <b>{{ $score->original_word}}</b>
                    </p>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
