<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReactPatientController extends Controller
{
    public function index(){
        return view('patient');
    }
}
