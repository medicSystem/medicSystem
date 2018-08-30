<?php

namespace App\Http\Controllers\Database;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Patient;

class CouponsController extends Controller
{
    public function listActiveCoupon()
    {
        $dataTime = date('Y-m-d H:i:s');
        $coupon = Coupon::where('date', '>=', $dataTime)->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function listActiveCouponForPatient()
    {
        $coupon = Coupon::where(function ($query) {
            $user_id = Auth::user()->getAuthIdentifier();
            $patients = Patient::where('users_id', $user_id)->get();
            foreach ($patients as $patient) {
                $id = $patient->id;
            }
            $dataTime = date('Y-m-d H:i:s');
            $query->where('date', '>=', $dataTime)->where('patients_id', $id);
        })->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function listNotActiveCouponForPatient()
    {
        $coupon = Coupon::where(function ($query) {
            $user_id = Auth::user()->getAuthIdentifier();
            $patients = Patient::where('users_id', $user_id)->get();
            foreach ($patients as $patient) {
                $id = $patient->id;
            }
            $dataTime = date('Y-m-d H:i:s');
            $query->where('date', '<=', $dataTime)->where('patients_id', $id);
        })->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function listNotActiveCoupon()
    {
        $dataTime = date('Y-m-d H:i:s');
        $coupon = Coupon::where('date', '<=', $dataTime)->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function listActiveCouponByDoctorId()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $doctors = Doctor::where('users_id', $user_id)->get();
        foreach ($doctors as $doctor) {
            $id = $doctor->id;
        }
        $dataTime = date('Y-m-d H:i:s');
        $coupon = Coupon::where('date', '>=', $dataTime)->where('doctors_id', $id)->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function listNotActiveCouponByDoctorId()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $doctors = Doctor::where('users_id', $user_id)->get();
        foreach ($doctors as $doctor) {
            $id = $doctor->id;
        }
        $dataTime = date('Y-m-d H:i:s');
        $coupon = Coupon::where('date', '<=', $dataTime)->where('doctors_id', $id)->get();
        $encodeCoupon = json_encode($coupon);
        return $encodeCoupon;
    }

    public function delete($id)
    {
        Coupon::where('id', $id)->delete();
    }

    public function deleteNotActive($id)
    {
        $coupons = Coupon::where('id', $id)->get();
        foreach ($coupons as $coupon) {
            if ($coupon->date <= date('Y-m-s H:i:s')) {
                Coupon::where('id', $id)->delete();
            }
        }
    }

    public function add(Request $request)
    {
        $coupon = new Coupon();
        $id = Auth::user()->getAuthIdentifier();
        $patientIds = DB::select('SELECT `patients`.`id` FROM `patients` JOIN `users` ON `patients`.`users_id` = `users`.`id` WHERE `users`.`id` = ' . $id);
        foreach ($patientIds as $patientId) {
            $coupon->patients_id = $patientId->id;
        }
        $coupon->doctors_id = $request->doctors_id;
        $coupon->date = $request->date;
        $coupon->save();
    }
}
