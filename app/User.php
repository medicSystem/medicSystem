<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type', 'birthday', 'phone_number', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $primaryKey = 'id';
    protected $table = 'users';

    public function doctor(){
        return $this->hasOne('App\Doctor', 'users_id', 'id');
    }

    public function patient(){
        return $this->hasOne('App\Patient', 'users_id', 'id');
    }

    public function banList(){
        return $this->hasOne('App\Ban_list', 'users_id', 'id');
    }
}
