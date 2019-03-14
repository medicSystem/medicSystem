<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getPatientID($id){
        $patientIds = DB::select('SELECT `patients`.`id` FROM `patients` JOIN `users` ON `patients`.`users_id` = `users`.`id` WHERE `users`.`id` = '.$id);
        return $patientIds;
    }
}
