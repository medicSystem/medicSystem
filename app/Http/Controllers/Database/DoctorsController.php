<?php

namespace App\Http\Controllers\Database;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;
use App\Doctor_type;
use App\Coupon;

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

    public function getDoctors($type_name)
    {
        $doctor_types_id = Doctor_type::where('type_name', $type_name)->get();
        foreach ($doctor_types_id as $item) {
            $type_id = $item->id;
        }
        $doctors = Doctor::where('doctor_types_id', $type_id)->get();
        $encodeDoctors = json_encode($doctors);
        return $encodeDoctors;
    }

    public function getDoctor($id)
    {
        $doctors = Doctor::where('id', $id)->get();
        $encodeDoctors = json_encode($doctors);
        return $encodeDoctors;
    }

    public function getWorkTime($id)
    {
        $doctors = Doctor::where('id', $id)->get();
        foreach ($doctors as $doctor) {
            $workTime = $doctor->work_time;
        }
        $workTime = explode('-', $workTime);
        $startWork = strtotime($workTime[0]);
        $endWork = strtotime($workTime[1]);
        $workTimeArray[] = array();
        $i = 0;
        $receiptTime = 0;
        while (($startWork + $receiptTime) < $endWork) {
            $workTimeArray[$i] = date('H:i', $startWork + $receiptTime);
            $receiptTime += (30 * 60);
            $i++;
        }
        return $workTimeArray;
    }

    public function getBusyTime($id, $needDate)
    {
        $date = array();
        $coupons = Coupon::where('doctors_id', $id)->get();
        $i = 0;
        foreach ($coupons as $coupon) {
            $dateTime[$i] = $coupon->date;
            $i++;
        }
        $workTime = $this->getWorkTime($id);
        for ($k = 0; $k < $i; $k++) {
            $time[$k] = date('H:i', strtotime($dateTime[$k]));
        }
        $freeTime = array_intersect($workTime, $time);
        $arr = array_keys($freeTime);
        for ($i = 0; $i < count($arr); $i++) {
            $strDate[$i] = $needDate . ' ' . $freeTime[$arr[$i]];
            $date[$i] = date( 'Y-m-d H:i',strtotime($strDate[$i]));
        }
        $encodeResult = json_encode($date);
        return $encodeResult;
    }

    public function getFreeTime($id, $needDate)
    {
        $date = array();
        $coupons = Coupon::where('doctors_id', $id)->get();
        $i = 0;
        foreach ($coupons as $coupon) {
            if (date('Y-m-d', strtotime($coupon->date)) == $needDate){
                $dateTime[$i] = $coupon->date;
                $i++;
            }
            $dateTime[$i] = $coupon->date;
            $i++;
        }
        $workTime = $this->getWorkTime($id);
        for ($k = 0; $k < $i; $k++) {
            $time[$k] = date('H:i', strtotime($dateTime[$k]));
        }
        $freeTime = array_diff($workTime, $time);
        $arr = array_keys($freeTime);
        for ($i = 0; $i < count($arr); $i++) {
            $strDate[$i] = $needDate . ' ' . $freeTime[$arr[$i]];
            $date[$i] = date( 'Y-m-d H:i',strtotime($strDate[$i]));
        }
        $encodeResult = json_encode($date);
        return $encodeResult;
    }
}
