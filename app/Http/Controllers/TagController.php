<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Services\CommonService;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.tags.all', [
            'tags' => $this->allTagsHandle(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3'
        ]);

        auth()->user()->tags()->create($request->only('name'));
        toast('برچسب (تگ) مورد نظر با موفقیت ایجاد شد', 'success')->autoClose(3000);
        return redirect(route('tags.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if (auth()->user()->id === $tag->user_id) {
            return view('admin.layouts.tags.edit', compact('tag'));
        } else {
            toast('شما دسترسی لازم برای ویرایش این برچسب (تگ) را ندارید', 'warning')->autoClose(3000);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->only('name'));
        toast('برچسب (تگ) مورد نظر با موفقیت ویرایش شد', 'success')->autoClose(3000);
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        toast('برچسب (تگ) مورد نظر با موفقیت حذف شد', 'success')->autoClose(3000);
        return redirect(route('tags.index'));
    }

    /**
     * 
     * handle all tags if owner created or not 
     * also admin can see all them
     *
     * @return \Illuminate\Http\Response
     */

    public function allTagsHandle()
    {
        return CommonService::handleAllDiffusion(resolve(Tag::class));
    }
}
