<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

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


   public function editorUploadImage()
   {
      $this->validate(request(), [
         'upload' => 'required|mimes:jpeg,png,bmp',
      ]);

      $year = Carbon::now()->year;
      $imagePath = "/upload/posts/";

      $file = request()->file('upload');
      $filename = $file->getClientOriginalName();

      if (file_exists(public_path($imagePath) . $filename)) {
         $filename = Carbon::now()->timestamp . $filename;
      }

      $file->move(public_path($imagePath), $filename);
      $url = $imagePath . $filename;

      return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
   }
}
