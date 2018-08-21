<?php
/**
 * Created by PhpStorm.
 * User: ebortnik
 * Date: 27.07.2018
 * Time: 15:36
 */

namespace App\Http\Controllers\Database;


use App\News;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;

class UploadNews
{
    public function getNews($type)
    {
        $pattern = '#^[0-9]+$#';
        if ($type == 'short') {
            $news = News::orderByDesc('updated_at')->take(3)->get();
        } elseif ($type == 'long') {
            $news = News::orderByDesc('updated_at')->get();
        } elseif (preg_match($pattern, $type)) {
            $news = News::where('id', $type)->get();
        } else {
            $news = News::all();
        }
        $encodeNews = json_encode($news);
        return $encodeNews;
    }

    public function list()
    {
        $news = News::all();
        $encodeNews = json_encode($news);
        return $encodeNews;
    }

    public function addNews(Request $request)
    {
        $news = new News();
        $news->news_name = $request->news_name;
        $news->content = $request->news_content;

        //upload image
        $dir = 'news';
        $divName = 'news_photo';
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
        $news_photo = substr($path, strpos($path, '/') + $length);

        $news->photo = $news_photo;
        $news->save();
    }

    public function updateNews($id, Request $request)
    {
        //delete old photo
        $newsList = News::where('id', $id)->get();
        foreach ($newsList as $news) {
            $photo = $news->photo;
        }
        $path = public_path() . '/upload/news/' . $photo;
        unlink($path);

        //upload image
        $dir = 'news';
        $divName = 'news_photo';
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
        $news_photo = substr($path, strpos($path, '/') + $length);

        //update db
        News::where('id', $id)->update(['news_name' => $request->news_name, 'photo' => $news_photo, 'content' => $request->news_content]);
    }

    public function deleteNews($id)
    {
        $newsList = News::where('id', $id)->get();
        foreach ($newsList as $news) {
            $photo = $news->photo;
        }
        $path = public_path() . '/upload/news/' . $photo;
        unlink($path);
        News::where('id', $id)->delete();
    }
}