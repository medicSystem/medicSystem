<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Database\ValidateDoctorsController;
use App\Medical_card;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Database\DoctorsController;

class UserTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function control()
    {
        $id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($id);
        if ($role == 'patient') {
            $medicalCards = DB::select('SELECT `users`.`id` FROM `medical_cards` join `patients` ON `medical_cards`.`patients_id`=`patients`.`id` JOIN `users` ON `patients`.`users_id`=`users`.`id`');
            $checkMedicalCard = Medical_card::all();
            $check = false;
            if ($checkMedicalCard->isNotEmpty()) {
                foreach ($medicalCards as $medicalCard) {
                    if ($id == $medicalCard->id) {
                        $check = true;
                        break;
                    }
                }
            }
            if ($check) {
                return redirect()->route($role);
            } else {
                return redirect()->route('viewMedicalCard');
            }
        } elseif ($role == 'doctor') {
            $validate = new ValidateDoctorsController();
            $validates = $validate->getValidateDoctor($id);
            if ($validates->isNotEmpty()) {
                $doctor = new DoctorsController();
                $doctors = $doctor->getDoctor($id);
                if ($doctors->isNotEmpty()) {
                    echo 'notEmpty doctor';
                    die();
                    return redirect()->route($role);
                } elseif ($doctors->isEmpty()) {
                    echo 'empty';
                    die();
                }
            }
        } else {
            return redirect()->route($role);
        }
    }

    public function addMedicalCard(Request $request)
    {

        $id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($id);
        $patientIds = DB::select('SELECT `patients`.`id` FROM `patients` JOIN `users` ON `patients`.`users_id` = `users`.`id`');
        foreach ($patientIds as $item) {
            $patientId = $item->id;
        }
        $medical_card = new Medical_card();
        $medical_card->postal_address = $request->postal_address;
        $medical_card->sex = $request->sex;
        $medical_card->chronic_disease = $request->chronic_disease;
        $medical_card->allergy = $request->allergy;
        $medical_card->patients_id = $patientId;
        $medical_card->save();
        return redirect()->route($role);
    }
}
