<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->paginate();
        return view('admin.layouts.comments.all',compact('comments'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment 
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request,$id)
    {
        $request = Comment::findOrFail($id);
        if ($request->status == 'accepted' || $request->status == 'rejected') {
            toast('وضعیت نظر قبلا تغییر کرده است','warning')->autoClose(4000);
            return back();
        }else{
        $request->update(['status' => 'accepted']);
        toast('نظر با موفقیت تایید شد','success')->autoClose(2000);
        return redirect(route('comments.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $id 
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request,$id)
    {
        $request = Comment::findOrFail($id);
        if ($request->status == 'accepted' || $request->status == 'rejected') {
            toast('وضعیت نظر قبلا تغییر کرده است','warning')->autoClose(4000);
            return back();
        } 
        $request->update(['status' => 'rejected']);
        toast('نظر با موفقیت رد شد','success')->autoClose(2000);
        return redirect(route('comments.index'));
    }

      /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.layouts.comments.show',compact('comment'));
    }
}

