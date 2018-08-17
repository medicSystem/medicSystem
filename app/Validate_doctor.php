<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Validate_doctor extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'validate_doctors';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type', 'birthday', 'phone_number', 'avatar', 'patent', 'experience', 'work_time', 'send_date', 'status', 'doctor_types_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function doctorType(){
        return $this->belongsTo('App\Doctor_type');
    }
}
