<?php

use App\Http\Controllers\pagesController;
use App\Http\Controllers\postsController;
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
Route::get('/',[pagesController::class,'index']);

Route::get('/blog',[postsController::class,'index']);
Route::get('/blog/create',[postsController::class,'create']);
Route::Post('/blog',[postsController::class,'store']);
Route::get('/blog/{slug}', [PostsController::class, 'show']);
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit']);
Route::put('/blog/{slug}', [PostsController::class, 'Update']);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

