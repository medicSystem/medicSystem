<?php
/**
 * Created by PhpStorm.
 * User: ebortnik
 * Date: 26.07.2018
 * Time: 15:23
 */

namespace App\Http\Controllers\Database;


use App\Directory;

class UploadDictionary

{
    public function getDirectories()
    {
        $directories = Directory::all();
        $encodeDirectory = json_encode($directories);
        return $encodeDirectory;
    }
}