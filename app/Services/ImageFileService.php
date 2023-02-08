<?php

namespace App\Services;

use App\Models\File;

class ImageFileService
{

    public static function upload($request ,$inputName)
    {
        // dd(sizeof($request->file("$inputName")));
        // if ($request->hasFile("$inputName") <= 1) {
        //     $file = $request->file("$inputName");
        //     $filename = uniqid();
        //     $extension = $file->getClientOriginalExtension();
        //     $directoryPath = "app/public/";
        //     $file->move(storage_path($directoryPath), $filename . '.' . $extension);
        //     return $directoryPath . $filename . '.' . $extension;
        // if (sizeof($request->hasFile("$inputName")) > 1) {

            $images=array();
            if($files=$request->file("$inputName")){
                foreach($files as $file){
                    $filename = uniqid();
                    $extension = $file->getClientOriginalExtension();
                    $directoryPath = "app/public/";
                    $file->move(storage_path($directoryPath), $filename . '.' . $extension);
                    $images[]= $filename . '.' . $extension;
                }
                return $images;
            }

            // $files = $request->file("$inputName");
            // foreach($files as $file)
            // {
            //     $file_name = uniqid();
            //     $extension = $file->getClientOriginalExtension();
            //     $request['news_id'] = $id;
            //     $request['file'] = $file_name;
            //     $directoryPath = "app/public/";
            //     $file->move(storage_path($directoryPath), $file_name . '.' . $extension);
            //     File::create([
            //         'image_id' => $id,
            //         "file" => $file_name
            //     ]);
            // }
        }
    // }

    // if ($request->hasFile('image')) {
    //     $file = $request->file('image');
    //     $fileExtension = strtolower($file->getClientOriginalExtension());
    //     $fileName = date('Ymdhis') . '.' . $fileExtension;


    // $file = $request->file('image');
    // $fileExtension = strtolower($file->getClientOriginalExtension());
    // $fileName = date('Ymdhis') . '.' . $fileExtension;
    // $directoryPath = "app/public/";
    // $result = $file->move(storage_path($directoryPath), $fileName);

    // if($request->hasFile('photos')){
    //     $files = $request->file('photos');
    //     foreach($files as $file)
    //     {
    //         $image_name = time().'_'. $file->getClientOriginalName();
    //         $request['image_id'] = $image->id;
    //         $request['photos'] = $image_name;
    //         $file->move(public_path('uploads/media/images/'), $image_name);
    //         Picture::create([
    //             'image_id' => $image->id,
    //             "photos" => $image_name
    //         ]);
    //     }
    // }
}


