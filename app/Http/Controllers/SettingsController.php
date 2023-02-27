<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.settings.all',[
            'settings' => DB::table('settings')->first(),
            'rowCount' =>  DB::table('settings')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'short_description' => 'nullable|string|max:255',
            'logo' => 'nullable|mimes:png,jpg,jpg,svg',
            'copyright' => 'nullable|string|max:150',
            'title' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'tel' => 'nullable|numeric',
        ]);

        DB::table('settings')->insert([
            'short_description' => $request->short_description,
            'logo' => CommonService::pictureUpload($request, 'logo'),
            'copyright' => $request->copyright,
            'content' => $request->content,
            'tel' => $request->tel,
            'title' => $request->title
        ]);

        toast('با موفقیت انجام شد', 'success')->autoClose(3000);
        return to_route('settings.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.layouts.settings.edit',[
            'settings' => DB::table('settings')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'short_description' => 'nullable|string|max:255',
            'logo' => 'nullable|mimes:png,jpg,jpg,svg',
            'copyright' => 'nullable|string|max:150',
            'title' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'tel' => 'nullable|numeric',
        ]);
        
        $settingsFirstRow = DB::table('settings')->first();

        DB::table('settings')->update([
            'short_description' => $request->short_description,
            'logo' => CommonService::pictureUpload($request, 'logo', $settingsFirstRow->logo),
            'copyright' => $request->copyright,
            'content' => $request->content,
            'tel' => $request->tel,
            'title' => $request->title
        ]);

        toast('با موفقیت انجام شد', 'success')->autoClose(3000);
        return to_route('settings.index');
    }
}
