<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{
    /*    public function __construct()
        {
            $this->middleware('auth');
        }*/

    public function upload(Request $request, $dir, $divName)
    {
        $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
        if (file_exists($dirName) && is_dir($dirName)) {
            $dirName = $dirName . '/' . $dir;
            if (file_exists($dirName) && is_dir($dirName)) {
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $img = ImageInt::make($file);
                $img->resize(200, 200)->save($path);
            } else {
                mkdir($dirName);
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $img = ImageInt::make($file);
                $img->resize(200, 200)->save($path);
            }
        } else {
            mkdir($dirName);
            $dirName = $dirName . '/' . $dir;
            mkdir($dirName);
            $file = $request->file($divName);
            $path = $file->store('upload/' . $dir);
            $img = ImageInt::make($file);
            $img->resize(200, 200)->save($path);
        }
        $length = strlen($dir) + 2;
        $name = substr($path, strpos($path, '/') + $length);
        return $name;
    }

    public function delete($db, $columnName, $id, $dir){
        $imageName = DB::table($db)->where('id', $id)->get($columnName);
        $path = public_path(). '/upload/' . $dir . '/' .$imageName;
        unlink($path);
    }

    public function view($db, $columnName, $id, $dir){
        $imageName = DB::table($db)->where('id', $id)->get($columnName);
        $path = public_path(). '/upload/' . $dir . '/' .$imageName;
        return $path;
    }
}
