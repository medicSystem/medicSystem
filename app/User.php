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
        'first_name', 'last_name', 'email', 'password', 'birthday', 'phone_number', 'avatar', 'role'
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

    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'users_id', 'id');
    }

    public function patient()
    {
        return $this->hasOne('App\Patient', 'users_id', 'id');
    }

    public function banList()
    {
        return $this->hasOne('App\Ban_list', 'users_id', 'id');
    }

    public function hasRole($id, $role)
    {
        $user = User::where('id', $id)->get();
        foreach ($user as $item) {
            $user = $item->role;
        }
        if ($user == $role) {
            return true;
        } else {
            return false;
        }
    }

    public function getRole($id)
    {
        $user = User::where('id', $id)->get();
        foreach ($user as $item) {
            $role = $item->role;
        }
        return $role;
    }

    public function getColumn($columnName, $id){
        $user = User::where('id', $id)->get();
        foreach ($user as $item){
            $columnValue = $item->$columnName;
        }
        return $columnValue;
    }

    public function getUser($id){
        $user = User::where('id', $id)->get();
        return $user;
    }
}
