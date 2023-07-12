<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
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
    $blogs = Blog::get();
    return view('welcome',compact('blogs'));
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog-detail/{slug}', [App\Http\Controllers\HomeController::class, 'blogDetail']);
Route::get('/search',[App\Http\Controllers\BlogController::class, 'search'])->name('search');
Route::post('/like',[App\Http\Controllers\BlogController::class, 'like'])->name('blog.like');
Route::resource('/blog',BlogController::class);

