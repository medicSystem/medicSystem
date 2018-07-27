<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageInt;

class UploadImageController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
            if (file_exists($dirName) && is_dir($dirName)) {
                $file = $request->file('avatar');
                $path = $file->store('upload');
                $img = ImageInt::make($file);
                $img->resize(200, 200)->save($path);
            } else {
                mkdir($dirName);
                $file = $request->file('avatar');
                $path = $file->store('upload');
                $img = ImageInt::make($file);
                $img->resize(200, 200)->save($path);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        $name = substr($path, strpos($path, '/') + 1);
    }
}
