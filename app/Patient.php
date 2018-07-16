<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function coupon(){
        return $this->hasMany('App\Coupon', 'patients_id', 'id');
    }

    public function messenger(){
        return $this->hasMany('App\Messenger', 'patients_id', 'id');
    }

    public function medicalCard(){
        return $this->hasOne('App\Medical_card', 'patients_id', 'id');
    }
}
