<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ban_list;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function list()
    {
        $resultArray = DB::select('SELECT * FROM `users` WHERE `users`.`id` NOT IN (SELECT `ban_lists`.`users_id` FROM `ban_lists`)');
        $encodeUsers = json_encode($resultArray);
        return $encodeUsers;
    }

    public function banList()
    {
        /*        $users = User::all();
                $ban_lists = Ban_list::all();
                $newArray = array();
                $firstArray = array();
                $resultArray = array();
                $i = 0;
                $k = 0;
                foreach ($ban_lists as $ban_list) {
                    $firstArray[$k] = $ban_list->users_id;
                    $k++;
                }
                foreach ($users as $user) {
                    $newArray[$i] = array(
                        'id' => $user->id,
                        'first_name' => $user->first_name,
                        'last_name' => $user->last_name,
                        'email' => $user->email,
                        'birthday' => $user->birthday,
                        'phone_number' => $user->phone_number,
                        'avatar' => $user->avatar,
                        'role' => $user->role);
                    $i++;
                }
                for ($j = 0; $j < $i; $j++) {
                    for ($l = 0; $l < $k; $l++) {
                        if ($newArray[$j]['id'] == $firstArray[$l]) {
                            $resultArray[$j] = $newArray[$j];
                        }
                    }
                }*/
        $resultArray = DB::table('users')->join('ban_lists', 'users.id', '=', 'ban_lists.users_id')->select(
            'first_name', 'last_name', 'email', 'birthday', 'phone_number', 'avatar', 'role', 'users_id')->get();
        $encodeUsers = json_encode($resultArray);
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
