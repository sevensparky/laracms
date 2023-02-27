<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CommonService;

class CategoryController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.categories.all', [
            'categories' => $this->allCategoriesHandle()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request): \Illuminate\Http\Response
    {
        auth()->user()->categories()->create($request->validated());

        toast('دسته مورد نظر با موفقیت ایجاد شد','success')->autoClose(3000);

        return redirect(route('categories.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (auth()->user()->id === $category->user_id) {
            return view('admin.layouts.categories.edit',compact('category'));
        } else {
            toast('شما دسترسی لازم برای ویرایش این دسته را ندارید', 'warning')->autoClose(3000);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        toast('دسته مورد نظر با موفقیت ویرایش شد','success')->autoClose(3000);

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        toast('دسته مورد نظر با موفقیت حذف شد','success')->autoClose(3000);

        return back();
    }

    /**
     *  Change status of specified category
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function changeCategoryStatus($id)
    {
        CommonService::changeStatus(resolve(Category::class), $id);
        return back();
    }

    /**
     *
     * handle all categories if owner created or not
     * also admin can see all them
     *
     * @return \Illuminate\Http\Response
     */

    public function allCategoriesHandle()
    {
        return CommonService::handleAllDiffusion(resolve(Category::class));
    }
}
