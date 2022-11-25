<?php

namespace App\Services;


class MediaUploadService
{

    public static function handle($request, $inputName, $format)
    {
        $q = $request->file("$inputName");
        // switch ($request) {
        //     case 'jpg':
        //     case 'png':
        //     case 'jpeg':
        //         ImageFileService::upload($request, $inputName);
        //         break;
        // }
            dd($q);

        foreach ($format as $letter) {

            switch ($letter) {

                case $q->getClientOriginalExtension():
                    dd(':)');
                    break;

            }
        }
    }
}
