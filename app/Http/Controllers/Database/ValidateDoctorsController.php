<?php

namespace App\Http\Controllers\Database;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validate_doctor;
use App\Http\Controllers\Database\DoctorsController;
use App\Http\Controllers\Database\UsersController;
use Illuminate\Support\Facades\DB;

class ValidateDoctorsController extends Controller
{
    public function getValidateDoctor($id)
    {
        $validate = DB::select('SELECT `validate_doctors`.`id`,`validate_doctors`.`first_name`,`validate_doctors`.`last_name`,`validate_doctors`.`email`,`validate_doctors`.`type`,`validate_doctors`.`birthday`,`validate_doctors`.`phone_number`,`validate_doctors`.`avatar`,`validate_doctors`.`patent`,`validate_doctors`.`experience`,`validate_doctors`.`work_time`,`validate_doctors`.`send_date`,`validate_doctors`.`status`,`validate_doctors`.`doctor_types_id` FROM `validate_doctors` JOIN `users` ON `validate_doctors`.`email` = `users`.`email` WHERE `users`.`id`='.$id );
        return $validate;
    }

    public function listNew()
    {
        $validateList = Validate_doctor::where('status', 'new')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function listRefuted()
    {
        $validateList = Validate_doctor::where('status', 'refuted')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function confirmation($id)
    {
        $doctor = new DoctorsController();
        $doctor->addDoctor($id);
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            Validate_doctor::where('email', $user->email)->delete();
        }
    }

    public function confutation($id)
    {
        $ban = new UsersController();
        $ban->banUser($id);
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            Validate_doctor::where('email', $user->email)->update(['status' => 'refuted']);
        }
    }
}
