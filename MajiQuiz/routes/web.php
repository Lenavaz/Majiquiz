<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', 'Main@home');

// Route::get('/', function(){
//     return view('home');
// });

Route::get('/', 'Main@index')->name('home');
Route::post('/start-quiz', 'Main@startQuiz')->name('start.quiz');
Route::post('/submit-quiz', 'Main@submitQuiz')->name('submit.quiz');

