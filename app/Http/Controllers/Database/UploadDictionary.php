<?php
/**
 * Created by PhpStorm.
 * User: ebortnik
 * Date: 26.07.2018
 * Time: 15:23
 */

namespace App\Http\Controllers\Database;


use App\Directory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;

class UploadDictionary

{
    public function getDirectories($category)
    {
        $directories = Directory::where('category', $category)->get();
        $encodeDirectory = json_encode($directories);
        return $encodeDirectory;
    }

    public function getDiseaseName(){
        $directories = Directory::all();
        $i =0;
        foreach ($directories as $directory){
            $name[$i] = $directory->disease_name;
            $i++;
        }
        $encodeDirectory = json_encode($name);
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

    public function addDirectory(Request $request)
    {
        //upload image
        $dir = 'directory';
        $divName = 'picture';
        $waterMark = public_path() . '/upload/waterMark/watermark.png';
        $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
        if (file_exists($dirName) && is_dir($dirName)) {
            $dirName = $dirName . '/' . $dir;
            if (file_exists($dirName) && is_dir($dirName)) {
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000) {
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight > 1000) {
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            } else {
                mkdir($dirName);
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000) {
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight > 1000) {
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            }
        } else {
            mkdir($dirName);
            $dirName = $dirName . '/' . $dir;
            mkdir($dirName);
            $file = $request->file($divName);
            $path = $file->store('upload/' . $dir);
            //resize big image
            $imgWidth = ImageInt::make($file)->width();
            $imgHeight = ImageInt::make($file)->height();
            $height = $imgHeight;
            $width = $imgWidth;
            if ($imgWidth > 1000) {
                $width = 1000;
                $difference = $imgWidth - $width;
                $height = $imgHeight - $difference;
            }
            if ($imgHeight > 1000) {
                $height = 1000;
                $difference = $imgHeight - $height;
                $height = $imgWidth - $difference;
            }
            $img = ImageInt::make($file);
            $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            $img->resize($width, $height)->save($path);
        }
        $length = strlen($dir) + 2;
        $picture = substr($path, strpos($path, '/') + $length);

        $directory = new Directory();
        $directory->picture = $picture;
        $directory->disease_name = $request->disease_name;
        $directory->category = $request->category;
        $directory->treatment = $request->treatment;
        $directory->symptoms = $request->symptoms;
        $directory->save();
    }

    public function updateDirectory(Request $request, $id)
    {
        //delete old photo
        $directoryList = Directory::where('id', $id)->get();
        foreach ($directoryList as $news) {
            $photo = $news->picture;
        }
        $path = public_path() . '/upload/directory/' . $photo;
        unlink($path);

        //upload image
        $dir = 'directory';
        $divName = 'picture';
        $waterMark = public_path() . '/upload/waterMark/watermark.png';
        $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
        if (file_exists($dirName) && is_dir($dirName)) {
            $dirName = $dirName . '/' . $dir;
            if (file_exists($dirName) && is_dir($dirName)) {
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000) {
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight > 1000) {
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            } else {
                mkdir($dirName);
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000) {
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight > 1000) {
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            }
        } else {
            mkdir($dirName);
            $dirName = $dirName . '/' . $dir;
            mkdir($dirName);
            $file = $request->file($divName);
            $path = $file->store('upload/' . $dir);
            //resize big image
            $imgWidth = ImageInt::make($file)->width();
            $imgHeight = ImageInt::make($file)->height();
            $height = $imgHeight;
            $width = $imgWidth;
            if ($imgWidth > 1000) {
                $width = 1000;
                $difference = $imgWidth - $width;
                $height = $imgHeight - $difference;
            }
            if ($imgHeight > 1000) {
                $height = 1000;
                $difference = $imgHeight - $height;
                $height = $imgWidth - $difference;
            }
            $img = ImageInt::make($file);
            $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            $img->resize($width, $height)->save($path);
        }
        $length = strlen($dir) + 2;
        $picture = substr($path, strpos($path, '/') + $length);

        //update db
        Directory::where('id', $id)->update(['picture' => $picture, 'disease_name' => $request->disease_name, 'category' => $request->category, 'treatment' => $request->treatment, 'symptoms' => $request->symptoms]);
    }

    public function deleteDirectory($id)
    {
        $directoryList = Directory::where('id', $id)->get();
        foreach ($directoryList as $news) {
            $photo = $news->picture;
        }
        $path = public_path() . '/upload/directory/' . $photo;
        unlink($path);
        Directory::where('id', $id)->delete();
    }
}