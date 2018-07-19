<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }
}
