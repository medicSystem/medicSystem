<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $id = array();
        $doctors = Doctor::all();
        $i = 0;
        foreach ($doctors as $doctor){
            $id [$i] = $doctor->id;
            $i++;
        }
        return view('test')->with(['doctor_id' => $id]);
    }
}
