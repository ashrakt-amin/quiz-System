@extends('dashboard.layouts.master')
<title>quiz answer</title>

@section('content')
@php
$num=1;
@endphp
<div class="card mt-5">
    @foreach($questions as $question)
    <div class="card-body ">
        <h5 class="card-title">{{$num++}} )<span> {{$question->question}}</span></h5>
        <p class="card-text">
        <div class="container text-center">
            <div class="row">
                <div class="col">a ) {{$question->option_a}}</div>
                <div class="col">b ) {{$question->option_b}}</div>
                <div class="col">c ) {{$question->option_c}}</div>
                <div class="col">d ) {{$question->option_d}}</div>
            </div>
        </div>
        </p>
    </div>
    <div class="card-footer text-muted">
        <span>correct answer : {{$question->correct_option}} </span>
    </div>

    @endforeach
</div>
@endsection