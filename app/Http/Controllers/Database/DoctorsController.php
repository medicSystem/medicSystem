<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    public function addDoctor($id){
        $doctorValidate = Validate_doctor::where('id',$id)->get();
        $userId = Auth::user()->getAuthIdentifier();
        foreach ($doctorValidate as $doctors){
            $doctor = new Doctor();
            $doctor->patent = $doctors->patent;
            $doctor->experience = $doctors->experience;
            $doctor->work_time = $doctors->work_time;
            $doctor->doctor_types_id = $doctors->doctor_types_id;
            $doctor->users_id = $userId;
            $doctor->save();
        }
    }
}
