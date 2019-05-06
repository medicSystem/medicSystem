<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getDoctors()
    {
        $result = null;
        $i = 0;
        $doctors = DB::table('doctors')->join('doctor_types', 'doctors.doctor_types_id', '=', 'doctor_types.id')
            ->join('users', 'doctors.users_id', '=', 'users.id')
            ->select('doctors.*', 'users.last_name', 'users.first_name', 'users.email', 'users.avatar', 'users.birthday',
                'doctor_types.type_name')->get();
        foreach ($doctors as $doctor) {
            $result[$i++] = array('id' => $doctor->id, 'patent' => $doctor->patent, 'experience' => $doctor->experience,
                'work_time' => $doctor->work_time, 'doctor_types_id' => $doctor->doctor_types_id, 'users_id' => $doctor->users_id,
                'last_name' => $doctor->last_name, 'first_name' => $doctor->first_name, 'email' => $doctor->email,
                'avatar' => $doctor->avatar, 'birthday' => $doctor->birthday, 'type_name' => $doctor->type_name);
        }
        return $result;
    }
}
