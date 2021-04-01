<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use Exception; 


class PostController extends Controller
{


     public function __construct()
     {
         $this->middleware('verifyCategoriesCount')->only(['create','store']);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.layouts.posts.all',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.posts.create')->with('tags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
    
        try {

          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $fileExtension = $file->getClientOriginalExtension();
              $fileName = date('Ymdhis') . '.'. $fileExtension;
              Image::make($file)->save(public_path('upload/posts/'). $fileName);
          }

          $post = Post::create(array_merge($request->only('title','category_id','description','content'),['image' => $fileName]));
          if ($request->tags) {
              $post->tags()->attach($request->tags);
          }

          session()->flash('success','!پست جدید با موفقیت ایجاد شد');
          return redirect(route('posts.index')); 
        } catch (Exception $e) {
            session()->flash('error','مشکلی رخ داده: ' . $e);
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.layouts.posts.edit',compact('post'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        
        try {
            unlink(public_path('upload/posts/'.$post->image));
            if ($request->hasFile('image')){
                $file = $request->file('image');
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = date('Ymdihs') . '.' . $fileExtension;
                Image::make($file)->save(public_path('upload/posts/'.$fileName));
                $post->update(array_merge($request->only('title','category_id','description','content'),['image' => $fileName]));
                if ($request->tags) {
                    $post->tags()->sync($request->tags);
                }
                session()->flash('success','!پست مورد نظر با موفقیت ویرایش شد');
                return redirect(route('posts.index'));
            }
        } catch (Exception $e) {
            session()->flash('error','مشکلی رخ داده: ' . $e);
            return back();
        }
        
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
            unlink(public_path('upload/posts/'.$post->image));
            $post->delete();
            return redirect(route('posts.index'));
    }

}
