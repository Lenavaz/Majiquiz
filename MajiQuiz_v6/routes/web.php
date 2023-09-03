<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');

// regista todas as rotas relacionadas com operacoes de autenticacao i.e., registo, login, etc.
Auth::routes();

Route::get('/select-quiz', 'QuizController@selectQuiz')->name('select-quiz');
Route::post('/start-quiz', 'QuizController@startQuiz')->name('start-quiz');
Route::post('/submit-quiz', 'QuizController@submitQuiz')->name('submit-quiz');


// ->middleware('auth') vai proteger esta route e apenas deixa que seja acedida por utilizadores autenticados.
// se um utilizador nao autenticado tentar aceder a esta route, será redirecionado para a view de login
Route::get('/my-scores', 'ScoreController@getUserScores')->name('my-scores')->middleware('auth');
Route::get('/leaderboard', 'ScoreController@getLeaderboard')->name('leaderboard');


// ->middleware(['auth', 'checkusername']) obriga a que utilizador esteja autenticado 
// e que o seu username seja 'admin' para poder aceder a esta route.
// ver ficheiro CheckUsername na pasta App/Http/Middleware (custom middleware criado com "php artisan make:middleware CheckUsername" e registado no Kernel)
Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware(['auth', 'checkusername']);

Route::get('/admin/create', 'AdminController@create')->name('admin.create')->middleware(['auth', 'checkusername']);
Route::post('/admin/create', 'AdminController@store')->name('admin.store')->middleware(['auth', 'checkusername']);

// Route::get('/admin/{id}', 'AdminController@show')->name('admin.show')->middleware(['auth', 'checkusername']);

Route::get('/admin/edit/{id}', 'AdminController@edit')->name('admin.edit')->middleware(['auth', 'checkusername']);
Route::put('/admin/update/{id}', 'AdminController@update')->name('admin.update')->middleware(['auth', 'checkusername']);

Route::delete('/admin/delete/{id}', 'AdminController@destroy')->name('admin.delete')->middleware(['auth', 'checkusername']);