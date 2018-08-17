<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'patent', 'experience', 'work_time', 'users_id', 'doctor_types_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function coupon()
    {
        return $this->hasMany('App\Coupon', 'doctors_id', 'id');
    }

    public function doctor_type()
    {
        return $this->belongsTo('App\Doctor_type');
    }

    public function messenger()
    {
        return $this->hasMany('App\Messenger', 'doctors_id', 'id');
    }

    public function diseaseHistory()
    {
        return $this->hasMany('App\Disease_history', 'doctors_id', 'id');
    }

    public function getDoctor($id)
    {
        $doctor = Doctor::where('users_id', $id)->get();
        return $doctor;
    }

    public function hasDoctor($id)
    {
        $doctor = Doctor::where('users_id', $id)->get();
        if ($doctor->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }
}
