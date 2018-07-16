<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $table = 'messengers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'doctors_id', 'patients_id',
    ];
}
