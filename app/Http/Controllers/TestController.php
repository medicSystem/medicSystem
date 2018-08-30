<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Directory;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $directories = Directory::all();
        $i =0;
        foreach ($directories as $directory){
            $name[$i] = $directory->disease_name;
            $i++;
        }
        return view('test')->with(['name' => $name]);
    }
}
