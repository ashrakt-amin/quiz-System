<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{

    public function index()
    {

        $userId = Auth::user()->id;
        $role = UserRole::where('id', "=", $userId)->first();
        $Quizzes = Quiz::pluck('id');
        if ($role->role_name == 'admin') {
            $results = result::with('user')->where('achieved_score', "!=", null)->get();

            // return $result;

            return view('dashboard.user.result-page', compact('results', 'Quizzes', 'role'));
        }

        $results = result::with(['quiz', 'user'])->where('user_id', "=", $userId)->get();
        // return $results;
        return view('dashboard.user.result-page', compact('results', 'Quizzes', 'role'));
    }
}
