<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messanger extends Model
{
    protected $table = 'messangers';
    protected $primaryKey = 'idMessanger';
    protected $fillable = [
        'doctors_idDoctor', 'patients_idPatient',
    ];
}
