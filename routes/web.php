<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionsController;
use App\Http\Illuminate\Auth\Middleware\admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::group( ['middleware' =>'auth'], function () {
    Route::get('/home',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/question',QuestionsController::class)->middleware('admin');
    Route::resource('/users',UserController::class);
    Route::resource('/quiz',QuizController::class);
    Route::get('/joinquiz/{id}',[QuizController::class,'joinQuiz'])->name('joinQuiz');
    Route::post('/answer',[AnswerController::class,'store'])->name('store.answer');
    Route::get('/answer/{id}',[AnswerController::class,'show'])->name('show.answer');

    Route::get('/results',[ResultController::class,'index'])->name('results');





    


});