<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease_history extends Model
{
    protected $table = 'disease_histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'analyzes', 'conclusion', 'directories_id', 'medical_cards_id', 'doctors_id'
    ];

    public function medicalCard(){
        return $this->belongsTo('App\Medical_card');
    }

    public function directory(){
        return $this->belongsTo('App\Directory');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
