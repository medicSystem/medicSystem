<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'message', 'send_datetime', 'messengers_id',
    ];

    public function messenger(){
        return $this->belongsTo('App\Messenger');
    }
}
