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
}
