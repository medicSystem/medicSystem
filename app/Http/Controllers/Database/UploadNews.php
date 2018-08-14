<?php
/**
 * Created by PhpStorm.
 * User: ebortnik
 * Date: 27.07.2018
 * Time: 15:36
 */

namespace App\Http\Controllers\Database;


use App\News;

class UploadNews
{
    public function getNews($type)
    {
        $pattern = '#^[0-9]+$#';
        if ($type == 'short'){
            $news = News::orderByDesc('updated_at')->take(3)->get();
        } elseif ($type == 'long'){
            $news = News::orderByDesc('updated_at')->get();
        }elseif ( preg_match($pattern, $type)){
            $news = News::where('id', $type)->get();
        } else{
            $news = News::all();
        }
        $encodeNews = json_encode($news);
        return $encodeNews;
    }

    public function list(){
        $news = News::all();
        $encodeNews = json_encode($news);
        return $encodeNews;
    }

    public function addNews(){
    }

    public function updateNews(){
    }

    public function deleteNews(){
    }
}