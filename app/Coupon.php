<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date', 'patients_id', 'doctors_id',
    ];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
