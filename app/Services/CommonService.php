<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class CommonService
{
    /**
     * @description directory address where all pictures are stored
     * @var string
     */
    protected static $file_store_directory =  'app/public/';

    /**
     *  change status row form database generally
     *
     * @param Model $model
     * @param $id
     * @param string $statusMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function changeStatus(Model $model, $id, $statusMessage = 'وضعیت با موفقیت تغییر کرد.'): \Illuminate\Http\RedirectResponse
    {
        $item = $model->query()->findOrFail($id);

        if ($item->status == 'inactive')
            $item->update(['status' => 'active']);
        else
            $item->update(['status' => 'inactive']);

        toast($statusMessage, 'success')->autoClose(3000);
        return back();
    }

    /**
     *  handle all diffusion if owner created or not
     *  also admin can see all them
     *
     * @param Model $model
     * @param int $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function handleAllDiffusion(Model $model, int $paginate = 5): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        if (auth()->user()->role != 'admin')
            return $model->query()->where('user_id', '=', auth()->id())->orderBy('id', 'DESC')->paginate($paginate);

        return $model->query()->orderBy('id', 'DESC')->paginate($paginate);
    }


    /**
     *  upload single image handler
     *
     * @param Request $request
     * @param $filename
     * @param $oldFile
     * @return string
     */
    public static function pictureUpload(Request $request, $filename, $oldFile = null): ?string
    {
        switch ($request->method()) {
            case 'POST':
                if ($request->hasFile($filename)) {
                    $file = $request->file($filename);
                    $newFileName = date('Ymdhis') . '.' . strtolower($file->getClientOriginalExtension());
                    $file->move(storage_path(self::$file_store_directory), $newFileName);
                    return $newFileName;
                }
            break;

            case 'PUT':
            case 'PATCH':
                if ($request->hasFile($filename)) {
                    if (File::exists(storage_path(self::$file_store_directory . $oldFile))) {
                        File::delete(storage_path(self::$file_store_directory . $oldFile));
                    }
                    $file = $request->file($filename);
                    $newFileName = date('Ymdhis') . '.' . strtolower($file->getClientOriginalExtension());
                    $file->move(storage_path(self::$file_store_directory), $newFileName);
                    return $newFileName;
                }else {
                    return $oldFile;
                }
            break;
        }
    }
}
