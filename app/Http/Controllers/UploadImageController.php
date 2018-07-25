<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadImageController extends Controller
{
    public function upload(Request $request){
        try{
            $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
            if (file_exists($dirName) && is_dir($dirName)) {

            }else{
                mkdir($dirName);
            }
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }
}
