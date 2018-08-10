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
        if ($type == 'short'){
            $news = News::orderByDesc('updated_at')->take(3)->get();
        } elseif ($type == 'long'){
            $news = News::orderByDesc('updated_at')->get();
        }else{
            $news = 'Input invalid parameter';
        }
        $encodeNews = json_encode($news);
        return $encodeNews;
    }

    public function getId($id){
        $newsId = News::where('id', $id)->get();
        $encodeNewsId = json_encode($newsId);
        return $encodeNewsId;
    }
}