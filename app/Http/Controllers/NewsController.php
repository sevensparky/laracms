<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\CommonService;
use App\Services\ImageFileService;
use Exception;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.news.all', [
            'news' => News::latest()->paginate(1000)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.news.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            News::create(array_merge($request->validated(), [
                'user_id' => auth()->id(),
                'picture' => CommonService::pictureUpload($request, 'picture'),
                'image' => ImageFileService::upload($request, 'image'),
                'video' => ImageFileService::upload($request, 'video'),
                'voice' => ImageFileService::upload($request, 'voice'),
                'tags' => [$request->tags]
            ]));
        } catch (Exception $e) {
            toast('مشکلی رخ داده', 'danger')->autoClose(3000);
            return back();
        }

        toast('خبر مورد نظر با موفقیت اضافه شد', 'success')->autoClose(3000);
        return to_route('news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.layouts.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        try {
            $news->update(array_merge($request->validated(), [
                'user_id' => auth()->id(),
                'picture' => CommonService::pictureUpload($request, 'picture', $news->picture),
                'image' => ImageFileService::upload($request, 'image'),
                'video' => ImageFileService::upload($request, 'video'),
                'voice' => ImageFileService::upload($request, 'voice'),
            ]));
        } catch (Exception $e) {
            toast('مشکلی رخ داده', 'danger')->autoClose(3000);
        }

        toast('خبر مورد نظر با موفقیت ویرایش شد', 'success')->autoClose(3000);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (File::exists(storage_path('app/public/' . $news->picture))) {
            File::delete(storage_path('app/public/' . $news->picture));
        }
        $news->delete();
        toast('خبر مورد نظر با موفقیت حذف شد', 'success')->autoClose(3000);
        return back();
    }

    /**
     * change news status
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeNewsStatus($id): \Illuminate\Http\RedirectResponse
    {
        CommonService::changeStatus(resolve(News::class), $id);
        return back();
    }
}
