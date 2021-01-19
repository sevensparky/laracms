<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

   Route::resource('categories',CategoryController::class);
   Route::resource('posts',PostController::class);
   Route::resource('tags',TagController::class);
   Route::get('/',[HomeController::class,'index'])->name('panel.index');
   Route::get('users',[UserController::class,'index'])->name('users.index');
   Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
   Route::put('users/{user}',[UserController::class,'changeRole'])->name('users.changeRole');
});



Auth::routes();

