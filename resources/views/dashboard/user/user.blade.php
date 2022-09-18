@extends('dashboard.layouts.master')
<title>users</title>
@section('content')
<div class="text-center mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$auth->name}}</a></td>
                <td>{{$auth->email}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection