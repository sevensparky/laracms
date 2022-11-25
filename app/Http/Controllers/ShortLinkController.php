<?php

namespace App\Http\Controllers;

use AshAllenDesign\ShortURL\Facades\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortlinks = DB::table('short_urls')->get();
        return view('admin.layouts.shortlink.all',compact('shortlinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.shortlink.create');
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
            'destination_url' => 'required'
        ]);

        $shortURLObject = ShortURL::destinationUrl($request->destination_url)->make();
        $shortURLObject->default_short_url;

        return redirect(route('shortlinks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shortlink = DB::table('users')->find($id);
        return view('admin.layouts.shortlink.edit', compact('shortlink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('short_urls')->delete($id);
        toast('لینک مورد نظر با موفقیت حذف شد','success')->autoClose(3000);
        return back();
    }
}
