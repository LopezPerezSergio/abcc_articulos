<?php

use App\Http\Controllers\ArticleController;
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
});

Route::get('articles',[ArticleController::class,'index'])->name('articles.index');

Route::get('articles/create',[ArticleController::class,'create'])->name('articles.create');
Route::post('articles',[ArticleController::class,'store'])->name('articles.store');

Route::get('articles/search',[ArticleController::class,'search'])->name('articles.search');

Route::get('articles/{article}/edit',[ArticleController::class,'edit'])->name('articles.edit');
Route::put('articles/{article}',[ArticleController::class,'update'])->name('articles.update');

Route::get('articles/delete',[ArticleController::class,'delete'])->name('articles.delete');
Route::delete('articles/{article}',[ArticleController::class,'destroy'])->name('articles.destroy');

/*  
GET|HEAD        admin/users/create users.create › Ad…  
GET|HEAD        admin/users/{user} users.show › Admi…  
PUT|PATCH       admin/users/{user} users.update › Ad…  
DELETE          admin/users/{user} users.destroy › A…  
GET|HEAD        admin/users/{user}/edit users.edit  …  */ 

