<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function control()
    {
        $id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($id);
        return redirect()->route($role);
    }
}
