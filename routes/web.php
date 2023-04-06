<?php

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
Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])->name('main');
Route::get('/banned',[\App\Http\Controllers\AuthController::class,'banned'])->name('banned');


Route::middleware(['admin','auth'])->get('/adminUsers',[\App\Http\Controllers\IndexController::class,'adminUsers'])->name('adminUsers');
Route::middleware(['admin','auth'])->get('/adminAddBook',[\App\Http\Controllers\IndexController::class,'adminAddBook'])->name('adminAddBook');
Route::middleware(['admin','auth'])->get('/adminAddCategory',[\App\Http\Controllers\IndexController::class,'adminAddCategory'])->name('adminAddCategory');
Route::get('/favorite',[\App\Http\Controllers\IndexController::class,'favorite'])->name('favorite');
Route::get('/login',[\App\Http\Controllers\IndexController::class,'login'])->name('login');
Route::get('/catalog',[\App\Http\Controllers\IndexController::class,'catalog'])->name('catalog');
Route::get('/catalog/{category}',[\App\Http\Controllers\IndexController::class,'catalog'])->name('booksCategory');
Route::middleware(['admin','auth'])->get('/book/{book:id}/update',[\App\Http\Controllers\IndexController::class,'update'])->name('update');

Route::post('/signup',[\App\Http\Controllers\AuthController::class,'signup'])->name('signup');
Route::post('/signin',[\App\Http\Controllers\AuthController::class,'signin'])->name('signin');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');


Route::post('/book/create',[\App\Http\Controllers\BookController::class,'store'])->name('addBook.post');
Route::get('/book/{book:id}',[\App\Http\Controllers\BookController::class,'show'])->name('singleBook');
Route::middleware(['admin','auth'])->post('/book/{book:id}/update',[\App\Http\Controllers\BookController::class,'update'])->name('update.post');
Route::middleware(['admin','auth'])->get('/book/{book:id}/delete',[\App\Http\Controllers\BookController::class,'destroy'])->name('book.delete');
Route::middleware(['auth'])->get('/book/{book:id}/addFavorite',[\App\Http\Controllers\BookController::class,'addFavorite'])->name('addFavorite');
Route::middleware(['auth'])->get('/book/{book:id}/deleteFavorite',[\App\Http\Controllers\BookController::class,'deleteFavorite'])->name('deleteFavorite');


Route::middleware(['admin','auth'])->post('/addCategory',[\App\Http\Controllers\CategoryController::class,'addCategory'])->name('addCategory.post');
Route::middleware(['admin','auth'])->post('/category/delete',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete');

Route::middleware(['admin','auth'])->get('/banUser/{id}',[\App\Http\Controllers\UserController::class,'banUser'])->name('banUser');
Route::middleware(['admin','auth'])->get('/activeUser/{id}',[\App\Http\Controllers\UserController::class,'activeUser'])->name('activeUser');




