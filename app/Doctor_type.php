<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_type extends Model
{
    protected $table = 'doctor_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_name',
    ];
}
