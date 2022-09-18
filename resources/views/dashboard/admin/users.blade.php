@extends('dashboard.layouts.master')
<title>users</title>


@section('content')

@if(session()->has('success'))
<div class="alert alert-primary" role="alert">
    {{session()->get('success')}}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-primary" role="alert">
    {{session()->get('error')}}
</div>
@endif


<div class="text-center mt-5">
    <table class="table">
        <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>

            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            @php
            $num=1;
            @endphp
            <tr>
                <th scope="row">{{$num++}}</th>
                <td>{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-primary" data-effect="effect-flip-horizontal" data-toggle="modal" href="#edit{{$user->id}}">edit</a>
                    <a class="btn btn-danger" data-effect="effect-flip-horizontal" data-toggle="modal" href="#delete{{$user->id}}">Delete</a>
                </td>
            </tr>
         
            <!-- edit Modal -->
            <div class="modal fade" id="edit{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$user->id}}</h5>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('users.update',$user->id)}}" method="POST" autocomplete="off">
                                {{ csrf_field() }}
                                {{ method_field('put') }}


                                <input class="form-control" value="{{$user->name}}" name="name" type="text" placeholder="name">

                                <input class="form-control" value="{{$user->email}}" name="email" type="email">

                                <button type="submit" class="btn btn-primary mb-3">Edit</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <!-- main-content closed -->


            <!-- delete Modal -->
            <div class="modal fade" id="delete{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">delete {{$user->name}}</h5>
                        </div>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-danger">delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>

@endsection