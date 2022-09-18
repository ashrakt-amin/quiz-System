@extends('dashboard.layouts.master')
<title>Results</title>

@section('content')
<div class="text-center mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">User Score</th>
                <th scope="col">Quiz Score</th>
                <th scope="col">Quiz Name</th>
                <th scope="col">pro</th>

            </tr>
        </thead>
        <tbody>
            @php
            $sl=1;
            @endphp
            @foreach($results as $result)
            @if( $role->role_name =='admin' && $role->id == $result->user_id)
            <tr>
                <td>{{$result->user->name}}</td>
                <td>{{$result->quiz_score}}</td>
                <td>{{$result->achieved_score}}</td>
                <td>{{$result->quiz->title}}</td>
                <td>{{$result->created_at}}</td>
            </tr>
            @else

            <tr>
                <th scope="row">{{$sl++}}</th>
                <td>{{$result->user->name}}</td>
                <td>{{$result->quiz_score}}</td>
                <td>{{$result->achieved_score}}</td>
                <td>{{$result->quiz->title}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('show.answer',$result->quiz_id)}}">answer</a>

                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection