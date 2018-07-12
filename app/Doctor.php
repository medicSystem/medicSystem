<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'idDoctor';
    protected $fillable = [
        'patent', 'experience', 'work_time', 'users_idUsers', 'doctors_type_idDoctor_type',
    ];
}
