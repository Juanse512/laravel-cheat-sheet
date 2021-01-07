<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome2');
});
Route::get('/welcome2', function () {
    return view('welcome2');
});
Route::get('/about', function () {
    $article = App\Models\Article::latest()->limit(5)->get();
    // return $article;
    return view('about', [
      'articles' => $article
    ]);
});
Route::get('/articles', function () {
  $article = App\Models\Article::latest()->get();
  return view('articles', [
    'articles' => $article
  ]);
});
Route::get('/POST/{post}', [PostsController::class, 'show']);
Route::get('/POSTSQL/{post}', [PostsController::class, 'showSQL']);
Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name("articles.index");
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create')->middleware('auth');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name("articles.show");
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit')->middleware('auth');
Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
