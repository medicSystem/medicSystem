<?php

namespace App\Http\Controllers;

use App\Medical_card;
use App\Directory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function control()
    {
        $id = Auth::user()->getAuthIdentifier();
        $patientId = Medical_card::all();
        $role = Auth::user()->getRole($id);
        $check = false;
        foreach ($patientId as $item) {
            if ($id === $item->patients_id && $role == 'patient') {
                $check = true;
                break;
            }
        }
        if ($check) {
            return redirect()->route($role);
        } else {
            return view("medical_card");
        }
    }

    public function addMedicalCard(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $medical_card = new Medical_card();
        $medical_card->postal_address = $request->postal_address;
        $medical_card->sex = $request->sex;
        $medical_card->chronic_disease = $request->chronic_disease;
        $medical_card->allergy = $request->allergy;
        $medical_card->patients_id = $id;

        $medical_card->save();

        $role = Auth::user()->getRole($id);
        return redirect()->route($role);
    }
}
