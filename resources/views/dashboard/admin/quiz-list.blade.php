@extends('dashboard.layouts.master')
<title>quiz list</title>


@section('content')
@can('admin')

<div class="col-sm-4 col-md-4 col-xl-3 mg-t-20 mb-5">
    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-flip-horizontal" data-toggle="modal" href="#modalAdd">add quiz</a>
</div>
@endcan

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
                <th scope="col">Title</th>
                <th scope="col">Duration</th>
            </tr>
        </thead>
        <tbody>
            @php
            $num=1;
            @endphp
            @foreach($quiz_list as $quiz)
            <tr>
                <th scope="row">{{$num++}}</th>
                @if($roleName == "admin")

                <td><a href="{{route('question.show',$quiz->id)}}" target="_blank">{{$quiz->title}}</a></td>
                <td>{{$quiz->duration}} minutes</td>
                <td>
                    <a class="btn btn-primary" data-effect="effect-flip-horizontal" data-toggle="modal" href="#edit{{$quiz->id}}">edit</a>
                    <a class="btn btn-danger" data-effect="effect-flip-horizontal" data-toggle="modal" href="#delete{{$quiz->id}}">Delete</a>
                </td>
                @else
                <td><a href="{{route('joinQuiz',$quiz->id)}}" target="_blank">{{$quiz->title}}</a></td>
                <td>{{$quiz->duration}} minutes</td>
                @endif
            </tr>



            <!-- edit Modal -->
            <div class="modal fade" id="edit{{$quiz->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$quiz->id}}</h5>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('quiz.update',$quiz->id)}}" method="POST" autocomplete="off">
                                {{ csrf_field() }}
                                {{ method_field('put') }}


                                <input class="form-control" value="{{$quiz->title}}" name="title" type="text" placeholder="name">

                                <input class="form-control" value="{{$quiz->duration}}" name="duration" type="number">

                                <button type="submit" class="btn btn-primary mb-3">Edit</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <!-- main-content closed -->


            <!-- delete Modal -->
            <div class="modal fade" id="delete{{$quiz->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">delete {{$quiz->title}}</h5>
                        </div>
                        <form action="{{route('quiz.destroy',$quiz->id)}}" method="post">
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

<!-- add quiz -->
<div class="modal" id="modalAdd">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add New Quiz</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>


            <form method="post" action="{{route('quiz.store')}}">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <input type="text" placeholder="Quiz Title" name="title" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Duration in Minute" name="duration" type="number" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection