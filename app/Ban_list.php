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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hasBan($id)
    {
        $ban_user = Ban_list::where('users_id', $id)->get();
        if ($ban_user->isNotEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public function addBan($id){
        $ban_list = new Ban_list();
        $ban_list->users_id = $id;
        $ban_list->save();
    }
}
