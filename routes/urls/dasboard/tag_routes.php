<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::resource('tags', TagController::class)->except('show');
});