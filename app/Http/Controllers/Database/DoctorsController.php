<?php

namespace App\Http\Controllers\Database;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;
use App\Doctor_type;

class DoctorsController extends Controller
{
    public function addDoctor($id)
    {
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            $doctorValidate = Validate_doctor::where('email', $user->email)->get();
        }
        foreach ($doctorValidate as $doctors) {
            $doctor = new Doctor();
            $doctor->patent = $doctors->patent;
            $doctor->experience = $doctors->experience;
            $doctor->work_time = $doctors->work_time;
            $doctor->doctor_types_id = $doctors->doctor_types_id;
            $doctor->users_id = $id;
            $doctor->save();
        }
    }

    public function getDoctors($type_name){
        $doctor_types_id = Doctor_type::where('type_name', $type_name)->get();
        foreach ($doctor_types_id as $item){
            $type_id = $item->id;
        }
        $doctors = Doctor::where('doctor_types_id', $type_id)->get();
        $encodeDoctors = json_encode($doctors);
        return $encodeDoctors;
    }

    public function getDoctor($id){
        $doctors = Doctor::where('id', $id)->get();
        $encodeDoctors = json_encode($doctors);
        return $encodeDoctors;
    }
}
