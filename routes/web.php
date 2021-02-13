<?php

use App\Models\Joke;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
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
//روتهای مدل جوک
Route::get('/', [JokeController::class, 'index'])->name('index');
Route::post('/show/{joke}', [JokeController::class, 'show'])->name('show');
Route::get('/create/', [JokeController::class, 'create'])->name('create')->middleware('auth');
Route::post('/store/', [JokeController::class, 'store'])->name('store')->middleware('auth');
Route::delete('/delete/{joke}', [JokeController::class, 'delete'])->name('delete')->middleware('auth');
Route::get('/edit/{joke}', [JokeController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/update/{joke}', [JokeController::class, 'update'])->name('update')->middleware('auth');
Route::get('/userJokes/{user}', [JokeController::class, 'userJokes'])->name('userJokes')->middleware('auth');
Route::post('/showWithUser/{joke}', [JokeController::class, 'showWithUser'])->name('showWithUser')->middleware('auth');
Route::get('/likedJokes/{user}', [LikeController::class, 'likedJokes'])->name('likedJokes')->middleware('auth');


//روتهای مدل لایک
Route::post('/like/{joke},{user},{isLiked}', [LikeController::class, 'like'])->name('like')->middleware('auth');
Route::post('/is_like/{joke},{user}', [LikeController::class, 'is_like'])->name('is_like')->middleware('auth');
Route::post('/disLike/{joke},{user},{isLiked}', [LikeController::class, 'disLike'])->name('disLike')->middleware('auth');

//روتهای آتونتیکیشن

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');



//روت لاگ اوت خودم:

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');


