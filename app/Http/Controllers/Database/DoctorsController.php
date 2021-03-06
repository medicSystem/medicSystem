<?php

namespace App\Http\Controllers\Database;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;
use App\Coupon;
use Illuminate\Support\Facades\DB;

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

    public function getDoctors()
    {
        $doctors = new Doctor();
        $encodeDoctors = json_encode($doctors->getDoctors());
        return $encodeDoctors;
    }

    public function getDoctor($id)
    {
        $doctors = DB::select('SELECT `doctors`.`id`,`doctors`.`patent`, `doctors`.`experience`, `doctors`.`work_time`, `users`.`first_name`, `users`.`last_name`, `users`.`avatar`, `users`.`email`,`users`.`birthday`,`users`.`phone_number`, `doctor_types`.`type_name` FROM `doctors` JOIN `users` ON `doctors`.`users_id` = `users`.`id` JOIN `doctor_types` ON `doctors`.`doctor_types_id` = `doctor_types`.`id` WHERE `doctors`.`id` =' . $id);
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
        $dateTime = array();
        $time = array();
        $patients_id = array();
        $result = array();
        $user_id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($user_id);
        if ($role == 'doctor') {
            $doctors = Doctor::where('users_id', $user_id)->get();
            foreach ($doctors as $doctor) {
                $id = $doctor->id;
            }
        }
        $coupons = Coupon::where('doctors_id', $id)->get();
        $i = 0;
        foreach ($coupons as $coupon) {
            if (date('Y-m-d', strtotime($coupon->date)) == $needDate) {
                $dateTime[$i] = $coupon->date;
                $patients_id[$i] = $coupon->patients_id;
                $i++;
            }
        }
        $workTime = $this->getWorkTime($id);
        for ($k = 0; $k < $i; $k++) {
            $time[$k] = date('H:i', strtotime($dateTime[$k]));
        }
        $freeTime = array_intersect($workTime, $time);
        $arr = array_keys($freeTime);
        for ($j = 0; $j < count($freeTime); $j++) {
            $result[$j] = array("time" => $freeTime[$arr[$j]], "patients_id" => $patients_id[$j]);
        }
        $encodeResult = json_encode($result);
        return $encodeResult;
        /*        $arr = array_keys($freeTime);
                for ($i = 0; $i < count($arr); $i++) {
                    $strDate[$i] = $needDate . ' ' . $freeTime[$arr[$i]];
                    $date[$i] = date( 'Y-m-d H:i',strtotime($strDate[$i]));
                }
                $encodeResult = json_encode($date);
                return $encodeResult;*/
    }

    public function getFreeTime($id, $needDate)
    {
        $date = array();
        $dateTime = array();
        $time = array();
        $user_id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($user_id);
        if ($role == 'doctor') {
            $doctors = Doctor::where('users_id', $user_id)->get();
            foreach ($doctors as $doctor) {
                $id = $doctor->id;
            }
        }
        $coupons = Coupon::where('doctors_id', $id)->get();
        $i = 0;
        foreach ($coupons as $coupon) {
            if (date('Y-m-d', strtotime($coupon->date)) == $needDate) {
                $dateTime[$i] = $coupon->date;
                $i++;
            }
        }
        $workTime = $this->getWorkTime($id);
        for ($k = 0; $k < $i; $k++) {
            $time[$k] = date('H:i', strtotime($dateTime[$k]));
        }
        $freeTime = array_diff($workTime, $time);
        $arr = array_keys($freeTime);
        for ($i = 0; $i < count($arr); $i++) {
            $strDate[$i] = $needDate . ' ' . $freeTime[$arr[$i]];
            $date[$i] = array("time" => date('Y-m-d H:i', strtotime($strDate[$i])), "id" => $i);
        }
        $encodeResult = json_encode($date);
        return $encodeResult;
    }
}
