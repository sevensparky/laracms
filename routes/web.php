<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){
   Route::resource('categories',CategoryController::class);
   Route::resource('posts',PostController::class);
   Route::resource('tags',TagController::class);
   Route::get('/dashboard',[PanelController::class,'dashboard'])->name('panel.index');
   Route::get('/profile',[PanelController::class,'profile'])->name('profile');
   Route::get('users',[UserController::class,'index'])->name('users.index');
   Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
   Route::put('users/{user}',[UserController::class,'changeRole'])->name('users.changeRole');
   Route::get('comments',[CommentController::class,'index'])->name('comments.index');
   Route::get('comments/{id}',[CommentController::class,'show'])->name('comments.show');
   Route::put('comments/accept/{id}',[CommentController::class,'accept'])->name('comments.accept');
   Route::put('comments/{id}',[CommentController::class,'reject'])->name('comments.reject');
});

Route::group([],function(){
   Route::get('/',[HomeController::class,'home'])->name('home');
   Route::get('/posts/{post}',[HomeController::class,'single'])->name('single.page');
   Route::post('comment/send',[HomeController::class,'comment'])->name('comment.send');
   Route::get('search',[HomeController::class,'search'])->name('search.page');
});

Auth::routes();
