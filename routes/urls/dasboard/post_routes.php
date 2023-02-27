<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::resource('posts', PostController::class);
});