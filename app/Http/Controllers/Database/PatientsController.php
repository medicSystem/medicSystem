<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    public function patientsList()
    {
        $patients = Patient::all();
        $i = 0;
        foreach ($patients as $patient) {
            $user_id[$i] = $patient->users_id;
            $list = DB::select('SELECT `users`.`first_name`,`users`.`id`,`users`.`last_name`,`users`.`email`,`users`.`birthday`,`users`.`phone_number`,`users`.`avatar`,`users`.`role`,`patients`.`id` AS `patients_id` FROM `users` JOIN `patients` ON `users`.`id` = `patients`.`users_id` WHERE `patients`.`users_id` = ' . $user_id[$i]);
            foreach ($list as $item){
                $patientsInfo[$i] = array("first_name"=>$item->first_name, "id" => $item->id, "last_name" => $item->last_name, "email" => $item->email, "birthday" => $item->birthday,
                    "phone_number" => $item->phone_number, "avatar" => $item->avatar, "role" => $item->role, "patients_id" => $item->patients_id);
            }
            $i++;
        }
        $encodeInfo = json_encode($patientsInfo);
        return $encodeInfo;
    }

    public function getPatientById($id)
    {
        $patient = DB::select('SELECT `users`.`first_name`,`users`.`id`,`users`.`last_name`,`users`.`email`,`users`.`birthday`,`users`.`phone_number`,`users`.`avatar`,`users`.`role`,`patients`.`id` AS `patients_id` FROM `users` JOIN `patients` ON `users`.`id` = `patients`.`users_id` WHERE `patients`.`users_id` = ' . $id);
        $encodePatient = json_encode($patient);
        return $encodePatient;
    }
}
