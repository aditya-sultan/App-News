<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('Guest');

Route::get('/404', function () {
    return view('404');
});

Route::post('/login', [LoginController::class, 'login'])->middleware('Guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('Login');

Route::get('/home', [NewsController::class, 'index'])->middleware('Login');

Route::resource('/news', NewsController::class)->middleware(['Login', 'MustAdmin']);

Route::resource('/comment', CommentController::class)->middleware('Login');

Route::get('/news={id}', [NewsController::class, 'show'])->name('news=')->middleware('Login');