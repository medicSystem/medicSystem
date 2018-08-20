<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function listActiveCoupon()
    {
        $dataTime = date('Y-m-d H:i:s');
        $coupon = Coupon::where('date', '>=', $dataTime)->get();
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

    public function delete($id)
    {
        Coupon::where('id', $id)->delete();
    }

/*    public function add(Request $request)
    {
        $coupon = new Coupon();
        $id = Auth::user()->getAuthIdentifier();
        $patientId = DB::select('SELECT `patients`.`id` FROM `patients` JOIN `users` ON `patients`.`users_id` = `users`.`id` WHERE `users`.`id` = ' . $id);
        $coupon->patients_id = $patientId;
        $coupon->doctors_id = $request->doctors_id;
        $coupon->date = $request->date;
        $coupon->status = 'new';
        $coupon->save();
    }*/
}
