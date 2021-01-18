<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/test', function () {
//    $title = 'qqqq rrrr tttt oooo';
//   $aaa =  implode('-',explode(' ', $title));
//   dd($aaa);
//});

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('show-article');
Route::post('/articles/{article:slug}/like', 'App\Http\Controllers\ArticleController@like')->name('like_article');

Route::post('/comments/store', 'App\Http\Controllers\CommentController@store')->name('add-comment');


Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
