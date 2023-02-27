<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/pages/faqs',[HomeController::class,'faqs'])->name('faqs.page');
Route::get('/news/{category}/{news}',[HomeController::class,'newsPage'])->name('news.page');
Route::get('search',[HomeController::class,'search'])->name('search.page');
Route::get('comment/send',[HomeController::class,'comment'])->name('comment.send');
Route::get('{url}', [HomeController::class, 'uniquePage'])->name('page.unique');

