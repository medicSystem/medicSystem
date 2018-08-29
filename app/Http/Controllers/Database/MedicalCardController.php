<?php

namespace App\Http\Controllers\Database;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Disease_history;

class MedicalCardController extends Controller
{
    public function getMedicalCardForDoctor($id)
    {
        $medical_cards = Medical_card::where('patients_id', $id)->get();
        $i = 0;
        foreach ($medical_cards as $card) {
            $users = DB::select('SELECT `users`.`first_name`, `users`.`last_name`, `users`.`birthday`, `users`.`phone_number` FROM `users` JOIN `patients` ON `users`.`id`=`patients`.`users_id` WHERE `patients`.`id` =' . $id);
            foreach ($users as $user) {
                $medical_card[$i] = array("first_name" => $user->first_name, "last_name" => $user->last_name, "birthday" => $user->birthday, "phone_number" => $user->phone_number, "id" => $card->id, "postal_address" => $card->postal_address,
                    "sex" => $card->sex, "chronic_disease" => $card->chronic_disease, "allergy" => $card->allergy, "patients_id" => $card->patients_id);
            }
            $i++;
        }
        $encodeMedicalCard = json_encode($medical_card);
        return $encodeMedicalCard;
    }

    public function getDiseaseHistoryByDoctorId()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $doctors = Doctor::where('users_id', $user_id)->get();
        foreach ($doctors as $doctor) {
            $id = $doctor->id;
        }
        $disease_histories = Disease_history::where('doctors_id', $id)->get();
        $encodeHistory = json_encode($disease_histories);
        return $encodeHistory;
    }

/*    public function getMedicalCardForPatient()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $patients = Patient::where('users_id', $user_id)->get();
        foreach ($patients as $patient) {
            $id = $patient->id;
        }
        $medical_cards = Medical_card::where('patients_id', $id)->get();
        $encodeMedicalCard = json_encode($medical_cards);
        return $encodeMedicalCard;
    }*/
}
