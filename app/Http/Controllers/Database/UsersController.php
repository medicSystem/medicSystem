<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ban_list;

class UsersController extends Controller
{
    public function list()
    {
        $users = User::all();
        $encodeUsers = json_encode($users);
        return $encodeUsers;
    }

    public function hasUser($id)
    {
        $users = User::where('id', $id)->get();
        $bool = false;
        foreach ($users as $item) {
            if ($item->id != null) {
                $bool = true;
            }
        }
        return $bool;
    }

    public function hasBan($id)
    {
        $users = Ban_list::where('users_id', $id)->get();
        $bool = false;
        foreach ($users as $item) {
            if ($item->id != null) {
                $bool = true;
            }
        }
        return $bool;
    }

    public function banUser($id)
    {
        $hasUser = $this->hasUser($id);
        $hasBan = $this->hasBan($id);
        $msg = '';
        if (!$hasUser) {
            echo 'Haven`t got user with id ' . $id;
        } else {
            if ($hasBan) {
                echo 'User with id ' . $id . ' is banned';
            } else {
                $ban_list = new Ban_list();
                $ban_list->users_id = $id;
                $ban_list->save();
                $msg = 'User banned successfully';
            }
        }
        return $msg;
    }

    public function returnUser($id)
    {
        $hasUser = $this->hasUser($id);
        $hasBan = $this->hasBan($id);
        $msg = '';
        if (!$hasUser) {
            $msg = 'Haven`t got user with id ' . $id;
        } else {
            if (!$hasBan) {
                $msg = 'User with id ' . $id . ' isn`t banned';
            } else {
                $ban_list = Ban_list::where('users_id', $id)->delete();
                $msg = 'User return successfully';
            }
        }
        return $msg;
    }
}
