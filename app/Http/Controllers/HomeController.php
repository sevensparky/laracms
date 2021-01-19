<?php

namespace App\Http\Controllers;

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
        return view('single',compact('post'));
    }
}
