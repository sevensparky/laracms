<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cms.home');
    }

    /*
    *  show the main page
    */    

    public function home()
    {
        return view('app');
    }


    public function search()
    {
        $search = request()->query('search');
        $posts =  Post::where('title','LIKE',"%{$search}%")->get();

        return view('search',compact('posts'));
    }
    

    public function single(Post $post)
    {
        $comments = $post->comments()->where('approved','active')->get();
        return view('single',compact('post','comments'));
    }


    public function comment(Request $request)
    {
        $this->validate($request,[
            'comment' => 'required'
        ]);

        Comment::create(array_merge(['user_id' => auth()->user()->id],$request->only('commentable_id','commentable_type','comment')));
        toast('نظر شما باموفقیت ثبت شد منتظر تایید مدیران باشید','success','bottom-right')->autoClose(3000);
        return back();
    }


}
