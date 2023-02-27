<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::resource('news', NewsController::class)->except('show');
    Route::get('news/check-items', [NewsController::class, 'checkItems'])->name('news.check.items');
    Route::get('news/select-items', [NewsController::class, 'selectItems'])->name('news.select.items');
    Route::post('news/check/{news}', [NewsController::class, 'itemSelected'])->name('news.check');
    Route::put('news/{id}/change-status', [NewsController::class, 'changeNewsStatus'])->name('news.change.status');
});
