<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $photo = $request->picture;
        $dir = 'test';
        $divName = 'picture';
        return route('uploadImage', ['dir' => $dir, 'divName' => $divName]);
    }
}
