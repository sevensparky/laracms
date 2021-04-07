<?php

namespace App\Http\Controllers;

use App\Models\User;

class PanelController extends Controller
{
    /**
     * Show the dashboard of admin panel
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
      //  return(auth()->user());
       return view('admin.layouts.panel');
    }

    /**
     * Show the profile of user
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
       return view('admin.layouts.pages.profile');
    }
}
