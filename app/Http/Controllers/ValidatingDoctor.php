<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidatingDoctor extends Controller
{
    public function index(){
        return view('validating');
    }
}
