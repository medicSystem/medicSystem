<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Validate_doctor extends Model
{
    use Notifiable;

    protected $primaryKey = 'idValidate_doctor';
    protected $table = 'validate_doctors';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type', 'birthday', 'phone_number', 'avatar', 'patent', 'experience', 'send_date', 'status', 'doctor_types_idDoctor_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
