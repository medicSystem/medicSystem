<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ban_list;

class BanUserController extends Controller
{
    private function check(){
        $id = Auth::user()->getAuthIdentifier();
        $ban_users = Ban_list::all();
        $bool = false;
        foreach ($ban_users as $item) {
            if ($id == $item->users_id) {
                $bool = true;
                break;
            }
        }
        return $bool;
    }

    public function index($first_name, $last_name){
        if ($this->check()){
            return view('ban_user')->with(['first_name'=>$first_name, 'last_name' => $last_name]);
        }else{
            return redirect()->route('control');
        }
    }
}
