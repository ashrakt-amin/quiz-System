@extends('dashboard.layouts.master')
<title>questions</title>

@section('content')
<div class="col-sm-4 col-md-4 col-xl-3 mg-t-20 mb-5">
    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-flip-horizontal" data-toggle="modal" href="#modalAdd">add Question</a>
</div>


@php
$num=1;
@endphp

<div class="card">
    @foreach($questions as $question)
    <div class="card-body ">
        <div class="float-end" style="border-radius: 5px">
            <a class="btn btn-primary" data-effect="effect-flip-horizontal" data-toggle="modal" href="#edit{{$question->id}}">E</a>
            <a class="btn btn-danger" data-effect="effect-flip-horizontal" data-toggle="modal" href="#delete{{$question->id}}">D</a>

        </div>
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


    <!-- edit Modal -->
    <div class="modal fade" id="edit{{$question->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$question->id}}</h5>
                </div>

                <div class="modal-body">
                    <form action="{{route('question.update',$question->id)}}" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="form-group">
                            <input type="text" value="{{$question->question}}" name="question" required class="form-control">
                        </div>
                        <input type="hidden" name="quiz_id" value="{{$question->quiz_id}}">
                        <div class="form-group">
                            <input type="text" value="{{$question->option_a}}" name="option_a" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{$question->option_b}}" name="option_b" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{$question->option_c}}" name="option_c" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{$question->option_d}}" name="option_d" required class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="correct_option" required>
                                @foreach($questions as $select)
                                @if($question->correct_option == $select->correct_option)
                                <option selected>{{$question->correct_option}}</option>
                                @endif
                                @endforeach
                                <option value="option_a">A</option>
                                <option value="option_b">B</option>
                                <option value="option_c">C</option>
                                <option value="option_d">D</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- main-content closed -->


    <!-- delete Modal -->
    <div class="modal fade" id="delete{{$question->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete {{$question->title}}</h5>
                </div>
                <form action="{{route('question.destroy',$question->id)}}" method="post">
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

    <!-- add question -->
    <div class="modal" id="modalAdd">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Question</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="text-center">
                    <div>
                        <form method="post" action="{{route('question.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Question" name="question" required class="form-control">
                            </div>
                            <input type="hidden" name="quiz_id" value="{{$quizId}}">
                            <div class="form-group">
                                <input type="text" placeholder="Option A" name="option_a" required class="form-control"></labal>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Option B" name="option_b" required class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Option C" name="option_c" required class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Option D" name="option_d" required class="form-control">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="correct_option" required>
                                    <option selected disabled value>-- Select Correct Option --</option>
                                    <option value="option_a">A</option>
                                    <option value="option_b">B</option>
                                    <option value="option_c">C</option>
                                    <option value="option_d">D</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection