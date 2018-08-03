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
    public function getDirectories($category)
    {
        $directories = Directory::where('category',$category)->get();
        $encodeDirectory = json_encode($directories);
        return $encodeDirectory;
    }

    public function uniqueCategoryName()
    {
        $categoryName = Directory::all();
        $arr = [];
        $l = 0;
        foreach ($categoryName as $item) {
            $arr[$l++] = $item->category;
        }
        $n = count($arr);
        $k = 0;
        $newArr = [];
        for ($i = 0; $i < $n; $i++) {
            $j = 0;
            while ($j < $k && $newArr[$j] !== $arr[$i])
                $j++;
            if ($j === $k)
                $newArr[$k++] = $arr[$i];
        }
        $uniqueCategoryName = json_encode($newArr);
        return $uniqueCategoryName;
    }
}