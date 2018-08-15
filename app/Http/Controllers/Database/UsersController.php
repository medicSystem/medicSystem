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
        $ban_lists = Ban_list::all();
        foreach ($users as $user){
            foreach ($ban_lists as $ban_list){
                if ($user->id != $ban_list->users_id){
                    $newArray ['id'] = $user->id;
                    $newArray['first_name'] = $user->first_name;
                    $newArray['last_name'] = $user->last_name;
                    $newArray['email'] = $user->email;
                    $newArray['birthday'] = $user->birthday;
                    $newArray['phone_number'] = $user->phone_number;
                    $newArray['avatar'] = $user->avatar;
                    $newArray['role'] = $user->role;
                    $newArray['created_at'] = $user->created_at;
                    $newArray['updated_at'] = $user->updated_at;
                }
            }
        }
        $encodeUsers = json_encode($newArray);
        return $encodeUsers;
    }

    public function banList()
    {
        $users = User::all();
        $ban_lists = Ban_list::all();
        foreach ($users as $user){
            foreach ($ban_lists as $ban_list){
                if ($user->id == $ban_list->users_id){
                    $newArray ['id'] = $user->id;
                    $newArray['first_name'] = $user->first_name;
                    $newArray['last_name'] = $user->last_name;
                    $newArray['email'] = $user->email;
                    $newArray['birthday'] = $user->birthday;
                    $newArray['phone_number'] = $user->phone_number;
                    $newArray['avatar'] = $user->avatar;
                    $newArray['role'] = $user->role;
                    $newArray['created_at'] = $user->created_at;
                    $newArray['updated_at'] = $user->updated_at;
                }
            }
        }
        $encodeBanUsers = json_encode($newArray);
        return $encodeBanUsers;
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
            $msg = 'Haven`t got user with id ' . $id;
        } else {
            if ($hasBan) {
                $msg = 'User with id ' . $id . ' is banned';
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
