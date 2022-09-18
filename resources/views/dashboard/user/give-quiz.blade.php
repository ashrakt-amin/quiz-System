@extends('dashboard.layouts.master')

<title>Quiz</title>

@section('content')

<h6 class="mt-3">Quiz Title: {{$quiz->title}} / Time: {{$quiz->duration}} Minutes</h6>
<div class="float-end text-bg-warning p-3" style="border-radius: 5px" >
    <h6 id="timer"> </h6>
</div>

<div id="test"></div>


<div class="card-body " style="margin-top:50px">
    <form method="post" action="{{route('store.answer')}}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quiz->id}}" readonly required>
        <input id="duration" type="hidden" value="{{$quiz->duration}}" readonly required>
        @php
        $i=1;
        @endphp

        @foreach($questions as $question)
                <select name="answer[{{$i++}}]" class="form-control" required>
                <option selected disabled value>Question: {{$question->question}}</option>
                    <option value="option_a">{{$question->option_a}}</option>
                    <option value="option_b">{{$question->option_b}}</option>
                    <option value="option_c">{{$question->option_c}}</option>
                    <option value="option_d">{{$question->option_d}}</option>
                </select>

                <hr>
            @endforeach
        
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </form>
</div>

<script>
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    setInterval(setTime, 1000);

    function setTime() {
        ++totalSeconds;
        secondsLabel.innerHTML = pad(totalSeconds % 60);
        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }

    function myFunction() {
        window.setTime = null;
        window.pad = null;
        document.getElementById('timer_style').innerHTML = "Time is Up!";
        document.getElementById('timer_style').style.color = 'red'
        $('#submit').hide();
    }

    window.setTimeout(myFunction, $quiz => duration * 60 * 1000);
</script>

<script>
    //settimer
    window.addEventListener('load', function() {
        var min = document.getElementById("duration").value -1;
        var second = 59;
        // Update the count down every 1 second
        var x = setInterval(function() {
            var time = min;

            second--;

            if (second == 1) {
                second = 60;
                min--;

            }
            // Output the result
            timer.innerHTML = time + " : " + second;
            if (time < 0) {
                clearInterval(x);
                timer.innerHTML = "EXPIRED";
                test.innerHTML = "<h2> Time out !</h2>";
                $('#submit').hide();

            }
        }, 1000);
    });
</script>

@endsection