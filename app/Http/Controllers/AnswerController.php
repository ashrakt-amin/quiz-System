<?php

namespace App\Http\Controllers;

use App\Mail\Test;
use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
      
        $answers = Question::where('quiz_id', $request->quiz_id)->get();
      
        $i = 1;
        $correct = 0;
        $total = 0;
        foreach ($answers as $answer) {

                    if ($answer->correct_option == $request->answer[$i]) {
                $correct++;
            } else {
            }

            $i++;
            $total++;
        }
        Result::create([
            'user_id' => Auth::user()->id,
            'quiz_id' => $request->quiz_id,
            'quiz_score' => $total,
            'achieved_score' => $correct
        ]);
        $user = Auth::user();
        $quiz_d = $request->quiz_id;
        $email = "ashraktamin678@gmail.com";
        Mail::to("$email")->send(new Test($user));
        // return response('email send');

        return redirect()->route('results')->with('success', 'Quiz done and result published');
    }

    public function show($id)
    {
        // return $id;
        $quiz_id = Quiz::findOrFail($id)->id;
        //  return $quiz_id;
        $questions = Question::where('quiz_id', $quiz_id)->get();

        return view('user.answer', compact('questions'));
    }
}
