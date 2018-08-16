<?php

namespace App\Http\Controllers\Database;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    public function addDoctor($id){
        $users = User::where('id', $id)->get();
        foreach ($users as $user){
            $doctorValidate = Validate_doctor::where('email',$user->email)->get();
        }
        foreach ($doctorValidate as $doctors){
            $doctor = new Doctor();
            $doctor->patent = $doctors->patent;
            $doctor->experience = $doctors->experience;
            $doctor->work_time = $doctors->work_time;
            $doctor->doctor_types_id = $doctors->doctor_types_id;
            $doctor->users_id = $id;
            $doctor->save();
        }
    }
}
