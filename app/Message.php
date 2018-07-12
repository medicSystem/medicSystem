<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'idMessage';
    protected $fillable = [
        'message', 'send_datetime', 'messangers_idMessanger',
    ];
}
