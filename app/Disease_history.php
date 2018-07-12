<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease_history extends Model
{
    protected $table = 'disease_historys';
    protected $primaryKey = 'idDisease_history';
    protected $fillable = [
        'disease_name', 'analyzes', 'directorys_idDirectory', 'medical_cards_idMedical_card', 'doctors_idDoctor'
    ];
}
