<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_card extends Model
{
    protected $table = 'medical_cards';
    protected $primaryKey = 'id';
    protected $fillable = [
        'postal_address', 'sex', 'chronic_disease', 'allergy', 'patients_id',
    ];
}
