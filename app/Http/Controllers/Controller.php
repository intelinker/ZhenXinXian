<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($file, $path) {
        $destPath = 'images/'.$path.'/';
        $fileName = $file->getClientOriginalName();
        $saveFile = $file->move($destPath, $fileName);

        $mediaPath = '/'.$destPath.$fileName;
        $imagePath = $mediaPath;

        if ($saveFile != null)
            return $mediaPath;
        else
            return null;
    }
}
