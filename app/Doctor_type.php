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

    public function doctor(){
        return $this->hasOne('App\Doctor', 'doctor_types_id', 'id');
    }

    public function validateDoctor(){
        return $this->hasMany('App\Validate_doctor', 'doctor_types_id', 'id');
    }
}
