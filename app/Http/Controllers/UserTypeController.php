<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\Database\ValidateDoctorsController;
use App\Validate_doctor;
use App\Medical_card;
use App\User;
use App\Ban_list;
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
            $validate = new Validate_doctor();
            $hasValidate = $validate->hasValidateDoctor($id);
            if ($hasValidate) {
                $validateStatus = $validate->getValidateDoctor($id);
                foreach ($validateStatus as $status) {
                    $checkStatus = $status->status;
                    if ($checkStatus == 'new') {
                        return redirect()->route('validating_doctor');
                    } elseif ($checkStatus == 'refuted') {
                        $ban = new Ban_list();
                        $hasBan = $ban->hasBan($id);
                        if (!$hasBan) {
                            $ban->addBan($id);
                            $first_name = $status->first_name;
                            $last_name = $status->last_name;
                            return redirect()->route('banUser', ['first_name' => $first_name, 'last_name' => $last_name]);
                        } else {
                            $first_name = $status->first_name;
                            $last_name = $status->last_name;
                            return redirect()->route('banUser', ['first_name' => $first_name, 'last_name' => $last_name]);
                        }
                    }
                }
            } else {
                $doctor = new Doctor();
                $hasDoctor = $doctor->hasDoctor($id);
                if ($hasDoctor) {
                    return redirect()->route($role);
                } else {
                    return redirect()->route('viewValidatePage');
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
