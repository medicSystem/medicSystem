<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $primaryKey = 'idCoupon';
    protected $fillable = [
        'date', 'status', 'patients_idPatient', 'doctors_idDoctor',
    ];
}
