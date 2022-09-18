<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\UserRole;
use App\Models\Participater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $role = UserRole::where('user_id', "=", $userId)->first();
        $roleName =$role->role_name;
        $quiz_list = Quiz::all();

      
            return view('dashboard.admin.quiz-list', compact('quiz_list','roleName'));
      
    }


    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required|unique:quizzes|max:255',
            'duration' => 'required',
        ]);
        if (Quiz::create([
            'title' => $request->title,
            'duration' => $request->duration,
        ])) {
            return redirect()->back()->with('success', 'Quiz: ' . $request->title . ' added successfully!');
        }
        return redirect()->back()->with('error', 'Quiz: ' . $request->title . ' was not added. Something wrong!');
    }



    public function show($id)
    {
        //
    }




    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required'
        ]);
        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            'title' => $request->title,
            'duration' => $request->duration
        ]);
        return redirect()->back()->with('success', 'Quiz: ' . $request->title . ' updated successfully');
    }


    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->back()->with('success', 'Quiz was deleted successfully');
    }

    public function joinQuiz($id)
    {
      $userId = Auth::user()->id;
        $check1 = Participater::where('quiz_id', "=", $id)->where('user_id', '=', $userId)->get();
        // return count($check1);

        if (count($check1) > 0) {
            return redirect()->back()->with('error', 'You already participated this quiz');
        }

         $check2 = Result::where('user_id', $userId)->get();
        if (count($check2) > 0) {
            return redirect()->back()->with('error', 'You already finished this quiz');
        }

        Participater::create([
            'user_id' => $userId,
            'quiz_id' => $id
        ]);

        $quiz = Quiz::where('id', $id)->first();
        $questions = Question::where('quiz_id', $id)->get();
        $start_time = Carbon::now();

        return view('user.give-quiz', compact('quiz', 'questions', 'start_time'));
    }
}
