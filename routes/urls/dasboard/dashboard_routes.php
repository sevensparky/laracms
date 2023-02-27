<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

    Route::get('/dashboard',[PanelController::class,'dashboard'])->name('panel.index');
    Route::get('/profile',[PanelController::class,'profile'])->name('profile');
    Route::post('upload-image',[PanelController::class,'editorUploadImage'])->name('uploadimage.editor');

    Route::resources([
        'faqs' => FaqController::class,
        'shortlinks' => ShortLinkController::class,
    ]);

    Route::get('social', [SocialController::class, 'index'])->name('social.index');
    Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
    Route::post('social', [SocialController::class, 'store'])->name('social.store');
    Route::get('social/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('social/update', [SocialController::class, 'update'])->name('social.update');
});