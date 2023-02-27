<?php

namespace App\Services;

class ImageFileService
{
    /**
     * upload each image file
     * @param $request
     * @param $inputName
     * @return array|void
     */
    public static function upload($request , $inputName)
    {
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
        }
}


