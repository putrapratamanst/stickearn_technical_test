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
                    <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                    <a href="#" class="float-right">21 March, 2014</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
