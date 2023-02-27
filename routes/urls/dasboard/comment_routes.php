<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){
    
    Route::get('comments',[CommentController::class,'index'])->name('comments.index');
    Route::get('comments/{id}',[CommentController::class,'show'])->name('comments.show');
    Route::put('comments/accept/{id}',[CommentController::class,'accept'])->name('comments.accept');
    Route::put('comments/{id}',[CommentController::class,'reject'])->name('comments.reject');
});

Route::post('comment/send',[HomeController::class,'comment'])->name('comment.send');