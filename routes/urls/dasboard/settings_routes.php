<?php

use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('settings/attach', [SettingsController::class, 'create'])->name('settings.create');
    Route::post('settings/attach', [SettingsController::class, 'store'])->name('settings.store');
    Route::get('settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings/update', [SettingsController::class, 'update'])->name('settings.update');
});