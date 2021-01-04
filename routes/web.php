<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


Route::get('/profile', [RegisteredUserController::class, 'profile'])->middleware(['auth'])->name('auth.profile');
Route::post('/user/update', [RegisteredUserController::class, 'update'])->middleware(['auth'])->name('auth.update');
Route::get('/user/avatar/{$filename}', [RegisteredUserController::class, 'getImage'])->middleware(['auth'])->name('auth.avatar');

Route::get('/Image', [ImageController::class, 'create'])->name('image.create');
Route::post('/Image/save', [ImageController::class, 'save'])->name('image.save');
Route::get('/Image/{id}', [ImageController::class, 'detail'])->name('image.detail');

Route::post('/comment/save', [CommentController::class, 'save'])->name('comment.save');
Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');




require __DIR__.'/auth.php';
