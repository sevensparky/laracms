<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::put('users/{user}',[UserController::class,'changeRole'])->name('users.changeRole');
    Route::get('auth/change-password',[HomeController::class,'changePassword'])->name('change-password.view');
    Route::post('auth/change-password/user',[HomeController::class,'authChangePassword'])->name('change-password.store'); 
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::put('profile/edit', [UserController::class, 'updateProfile'])->name('update.profile');

});

