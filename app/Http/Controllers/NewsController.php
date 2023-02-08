<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\ImageFileService;
use App\Services\MediaUploadService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.news.all', [
            'news' => News::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // if ($request->hasFile('image')) {
            // $file = $request->file('image');
            // $fileExtension = strtolower($file->getClientOriginalExtension());
            // $fileName = date('Ymdhis') . '.' . $fileExtension;
            // $directoryPath = "app/public/";
            // $result = $file->move(storage_path($directoryPath), $fileName);
        // }

        $news = new News();
        $news->company = multipleItems($request->company);
        $news->author = multipleItems($request->author);
        $news->journalist = multipleItems($request->journalist);
        $news->photographer = multipleItems($request->photographer);
        $news->translator = multipleItems($request->translator);
        $news->writer = multipleItems($request->writer);
        $news->headline = $request->headline;
        $news->title = $request->title;
        $news->service = $request->service;
        $news->tag = $request->tag;
        $news->image = ImageFileService::upload($request, 'image');
        $news->video = ImageFileService::upload($request, 'video');
        $news->voice = ImageFileService::upload($request, 'voice');
        // $news->image = MediaUploadService::handle($request, 'image');
        $news->description = $request->description;
        $news->external_link = $request->external_link;
        $news->content = $request->content;
        $news->news_type = $request->news_type;
        $news->news_production_type = $request->news_production_type;
        $news->news_source = $request->news_source;
        $news->news_source_address = $request->news_source_address;
        $news->message_end_news = $request->message_end_news;
        // dd($news);
        $news->save();

        // dd($request->all());

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.layouts.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
