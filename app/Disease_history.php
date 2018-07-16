<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease_history extends Model
{
    protected $table = 'disease_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'disease_name', 'analyzes', 'directories_id', 'medical_cards_id', 'doctors_id'
    ];
}
