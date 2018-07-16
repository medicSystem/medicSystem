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

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function message(){
        return $this->hasMany('App\Message', 'messengers_id', 'id');
    }
}
