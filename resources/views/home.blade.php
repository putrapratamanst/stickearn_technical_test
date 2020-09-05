@extends('layouts.main')
@section('content')


<div class="container" style=" overflow-y: scroll;">
    <div class="card-header">{{ __('Dashboard Admin') }}</div>
    @include('admin.navbar-admin')
    <hr>
    <br>
    <div class="row">
        @foreach($lists as $list)
        <div class="col-md-4">
            <div class="card" style="background-color: #fef9f9;">
                <div class="card-body">
                    <a href="/admin/result/history/{{$list->id}}">{{ strtoupper($list->username) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
