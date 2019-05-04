<?php

namespace App\Http\Controllers\Database;

use App\Directory;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical_card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Disease_history;
use App\Patient;
use Barryvdh\DomPDF\Facade as PDF;

class MedicalCardController extends Controller
{

    private function getPatientsId()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $patients = Patient::where('users_id', $user_id)->get();
        foreach ($patients as $patient) {
            $id = $patient->id;
        }
        return $id;
    }

    private function getDoctorId()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $doctors = Doctor::where('users_id', $user_id)->get();
        foreach ($doctors as $doctor) {
            $id = $doctor->id;
        }
        return $id;
    }

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
        $id = $this->getDoctorId();
        $disease_histories = DB::select('SELECT `disease_histories`.`id`,`disease_histories`.`conclusion`,`disease_histories`.`analyzes`, `disease_histories`.`directories_id`, `disease_histories`.`medical_cards_id`, `disease_histories`.`doctors_id`, `directories`.`disease_name`,`directories`.`category`,`directories`.`treatment`,`directories`.`symptoms`,`directories`.`picture` FROM `disease_histories` JOIN `directories` ON `disease_histories`.`directories_id` = `directories`.`id` WHERE `disease_histories`.`doctors_id`=' . $id);
        $encodeHistory = json_encode($disease_histories);
        return $encodeHistory;
    }

    public function getDiseaseHistoryByMedicalCardId($id)
    {
        $disease_histories = DB::select('SELECT `disease_histories`.`id`,`disease_histories`.`conclusion`,`disease_histories`.`analyzes`, `disease_histories`.`directories_id`, `disease_histories`.`medical_cards_id`, `disease_histories`.`doctors_id`, `directories`.`disease_name`,`directories`.`category`,`directories`.`treatment`,`directories`.`symptoms`,`directories`.`picture` FROM `disease_histories` JOIN `directories` ON `disease_histories`.`directories_id` = `directories`.`id` WHERE `disease_histories`.`medical_cards_id`=' . $id);
        $encodeHistory = json_encode($disease_histories);
        return $encodeHistory;
    }

    public function getDiseaseHistoryByDoctorIdAndMedicalCardId($medical_card_id)
    {
        $id = $this->getDoctorId();
        $disease_histories = DB::select('SELECT `disease_histories`.`id`,`disease_histories`.`conclusion`,`disease_histories`.`analyzes`, `disease_histories`.`directories_id`, `disease_histories`.`medical_cards_id`, `disease_histories`.`doctors_id`, `directories`.`disease_name`,`directories`.`category`,`directories`.`treatment`,`directories`.`symptoms`,`directories`.`picture` FROM `disease_histories` JOIN `directories` ON `disease_histories`.`directories_id` = `directories`.`id` WHERE `disease_histories`.`doctors_id`= ' . $id . ' AND `disease_histories`.`medical_cards_id`= ' . $medical_card_id);
        $encodeHistory = json_encode($disease_histories);
        return $encodeHistory;
    }

    public function addDisease($medical_card_id, Request $request)
    {
        $id = $this->getDoctorId();
        $directories = Directory::where('disease_name', $request->disease_name)->get();
        foreach ($directories as $directory) {
            $directories_id = $directory->id;
        }
        $diseaseHistories = new Disease_history();
        $diseaseHistories->analyzes = $request->analyzes;
        $diseaseHistories->conclusion = $request->conclusion;
        $diseaseHistories->directories_id = $directories_id;
        $diseaseHistories->medical_cards_id = (int)$medical_card_id;
        $diseaseHistories->doctors_id = $id;
        $diseaseHistories->save();
    }

    public function getMedicalCardForPatient()
    {
        $id = $this->getPatientsId();
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

    public function updateMedicalCard(Request $request)
    {
        $id = $this->getPatientsId();
        $user_id = Auth::user()->getAuthIdentifier();
        DB::table('medical_cards')->where('patients_id', $id)->update(['postal_address' => $request->postal_address, 'chronic_disease' => $request->chronic_disease, 'allergy' => $request->allergy]);
        DB::table('users')->where('id', $user_id)->update(['phone_number' => $request->phone_number]);
    }

    public function createPDFMedicalCard()
    {
        $id = $this->getPatientsId();
        $medical_cards = Medical_card::where('patients_id', $id)->get();
        $j = 0;
        foreach ($medical_cards as $card) {
            $users = DB::select('SELECT `users`.`first_name`, `users`.`last_name`, `users`.`birthday`, `users`.`phone_number` FROM `users` JOIN `patients` ON `users`.`id`=`patients`.`users_id` WHERE `patients`.`id` =' . $id);
            foreach ($users as $user) {
                $medic_card = array("first_name" => $user->first_name, "last_name" => $user->last_name, "birthday" => $user->birthday, "phone_number" => $user->phone_number, "postal_address" => $card->postal_address,
                    "sex" => $card->sex, "chronic_disease" => $card->chronic_disease, "allergy" => $card->allergy);
            }
            $disease_histories = DB::select('SELECT `disease_histories`.`id`,`disease_histories`.`analyzes`, `disease_histories`.`directories_id`, `disease_histories`.`medical_cards_id`, `disease_histories`.`doctors_id`, `directories`.`disease_name`,`directories`.`category`,`directories`.`treatment`,`directories`.`symptoms`,`directories`.`picture` FROM `disease_histories` JOIN `directories` ON `disease_histories`.`directories_id` = `directories`.`id` WHERE `disease_histories`.`medical_cards_id`=' . $card->id);
            foreach ($disease_histories as $history) {
                $doctors = DB::select('SELECT `users`.`first_name`, `users`.`last_name` FROM `users` JOIN `doctors` ON `users`.`id`=`doctors`.`users_id` WHERE `doctors`.`id` =' . $history->doctors_id);
                foreach ($doctors as $doctor) {
                    $doctor_name = $doctor->first_name . ' ' . $doctor->last_name;
                }
                $disease_history[$j] = array("analyzes" => $history->analyzes, "conclusion" => $history->conclusion,"disease_name" => $history->disease_name, "treatment" => $history->treatment, "symptoms" => $history->symptoms, "doctor_name" => $doctor_name);
                $j++;
            }
        }
        $pdf = PDF::loadView('pdf', compact('medic_card', 'disease_history'));
        $pdf->setPaper('A3', 'landscape');
        //return view('pdf', compact('medic_card', 'disease_history'));
        return $pdf->download('medical_card.pdf');
    }
}
