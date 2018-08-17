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

    public function getTypeNames(){
        $types = array();
        $i = 0;
        $doctor_types= Doctor_type::all();
        foreach ($doctor_types as $doctor_type){
            $types[$i] = $doctor_type->type_name;
            $i++;
        }
        return $types;
    }
}
