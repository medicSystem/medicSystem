<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban_list extends Model
{
    protected $table = 'ban_lists';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id'
    ];
}
