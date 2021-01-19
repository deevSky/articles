<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [ArticleController::class, 'latestArticles'])->name('latest-articles');
Route::get('/articles', [ArticleController::class,'index'])->name('articles');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('show-article');
Route::post('/articles/{article:slug}/like', [ArticleController::class,'like'])->name('like_article');
Route::post('/articles/page-view', [ArticleController::class,'pageView'])->name('page-view');
Route::post('/comments/store', [CommentController::class,'store'])->name('add-comment');


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/logout', function (){
    auth()->logout();
    return redirect('/');
});
