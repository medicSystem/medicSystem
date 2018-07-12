<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban_list extends Model
{
    protected $table = 'ban_lists';
    protected $primaryKey = 'idBan_list';
    protected $fillable = [
        'users_idUsers'
    ];
}
