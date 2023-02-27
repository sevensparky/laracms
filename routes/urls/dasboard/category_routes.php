<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'],'prefix' => 'panel'],function(){

    Route::put('category/{id}/change-status', [CategoryController::class, 'changeCategoryStatus'])->name('category.change.status');
    Route::resource('categories', CategoryController::class)->except('show');
});
