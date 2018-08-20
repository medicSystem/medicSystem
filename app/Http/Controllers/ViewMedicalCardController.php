<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewMedicalCardController extends Controller
{
    public function index(){
        return view('medical_card');
    }
}
