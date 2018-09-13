<?php

namespace App\Http\Controllers;

use App\Messenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return view('test');
    }
}
