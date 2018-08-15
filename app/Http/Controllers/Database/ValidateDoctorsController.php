<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validate_doctor;
use App\Http\Controllers\Database\DoctorsController;
use App\Http\Controllers\Database\UsersController;

class ValidateDoctorsController extends Controller
{
    public function listNew(){
        $validateList = Validate_doctor::where('status', 'new')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function listRefuted(){
        $validateList = Validate_doctor::where('status', 'refuted')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function confirmation($id){
        $doctor = new DoctorsController();
        $doctor->addDoctor($id);
        Validate_doctor::where('id', $id)->delete();
    }

    public function confutation($id){
        $doctorValidate = Validate_doctor::where('id',$id)->update('status', 'refuted');
        $ban = new UsersController();
        $ban->banUser($id);
    }
}
