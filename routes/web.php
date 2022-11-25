<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\UserController;
use App\Models\News;
use AshAllenDesign\ShortURL\Facades\ShortURL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => 'auth','prefix' => 'panel'],function(){

   Route::get('/dashboard',[PanelController::class,'dashboard'])->name('panel.index');
   Route::get('/profile',[PanelController::class,'profile'])->name('profile');
   Route::get('users',[UserController::class,'index'])->name('users.index');
   Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
   Route::put('users/{user}',[UserController::class,'changeRole'])->name('users.changeRole');
   Route::get('comments',[CommentController::class,'index'])->name('comments.index');
   Route::get('comments/{id}',[CommentController::class,'show'])->name('comments.show');
   Route::put('comments/accept/{id}',[CommentController::class,'accept'])->name('comments.accept');
   Route::put('comments/{id}',[CommentController::class,'reject'])->name('comments.reject');
   Route::get('auth/change-password',[HomeController::class,'changePassword'])->name('change-password.view');
   Route::post('auth/change-password/user',[HomeController::class,'authChangePassword'])->name('change-password.store');
   Route::post('upload-image',[PanelController::class,'editorUploadImage'])->name('uploadimage.editor');


    Route::resources([
       'faqs' => \App\Http\Controllers\FaqController::class,
       'categories' => CategoryController::class,
       'posts' => PostController::class,
       'tags' => TagController::class,
       'shortlinks' => ShortLinkController::class,
       'news' => NewsController::class
   ]);

   Route::get('social', [\App\Http\Controllers\SocialController::class, 'index'])->name('social.index');
   Route::get('social/create', [\App\Http\Controllers\SocialController::class, 'create'])->name('social.create');
   Route::post('social', [\App\Http\Controllers\SocialController::class, 'store'])->name('social.store');
   Route::get('social/edit', [\App\Http\Controllers\SocialController::class, 'edit'])->name('social.edit');
   Route::put('social/update/', [\App\Http\Controllers\SocialController::class, 'update'])->name('social.update');

});

Route::group([],function(){
   Route::get('/',[HomeController::class,'home'])->name('home');
   Route::get('/posts/{post}',[HomeController::class,'single'])->name('single.page');
   Route::post('comment/send',[HomeController::class,'comment'])->name('comment.send');
   Route::get('search',[HomeController::class,'search'])->name('search.page');
});

Auth::routes();

Route::get('/test', function(){

    function test($var, $char)
    {
        // switch ($var) {
        //     case 'python':
        //     case 'js':
        //     case 'php':
        //         dump('programming language');
        //         dd($var);
        //     break;

        //     case 'kali':
        //     case 'linux':
        //     case 'arch':
        //         dd($var);
        //     break;

        //     case in_array(['sparky', 'archcraft', 'ubuntu']):
        //         dd($var);
        //     break;


        //     default:
        //         dd('Nope');
        //     break;

        // }


        // $in = ;
        // foreach ($var as $a){
        //     switch ($a)
        //     {
        //         case array_search($a, $var, true):
        //             echo "{$var} is in the list";
        //         break;

        //         default:
        //             echo 'No Match Found<br />';
        //             break; /* Break out of the foreach */
        //     }
        // }


        // $char = array('A'=>'01', 'B'=>'02', 'C'=>'03', 'D'=>null);

    foreach($var as $letter)
    {
        switch($letter)
        {
            case $char:
                echo $letter;
                break;
            default:
            echo "";
            break;

        }
    }

    }

    test(['A', 'B', 'C'], 'C');


});

