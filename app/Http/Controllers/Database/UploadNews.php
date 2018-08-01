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
    public function getNews()
    {
        $news = News::orderByDesc('updated_at')->get();
        $encodeNews = json_encode($news);
        return $encodeNews;
    }
}