<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
