<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medical_card extends Model
{
    protected $table = 'medical_cards';
    protected $primaryKey = 'id';
    protected $fillable = [
        'postal_address', 'sex', 'chronic_disease', 'allergy', 'patients_id',
    ];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function diseaseHistory(){
        return $this->hasMany('App\Disease_history', 'medical_cards_id', 'id');
    }

    public function getUsersID(){
        $medicalCards = DB::select('SELECT `users`.`id` FROM `medical_cards` join `patients` ON `medical_cards`.`patients_id`=`patients`.`id` JOIN `users` ON `patients`.`users_id`=`users`.`id`');
        return $medicalCards;
    }
}
