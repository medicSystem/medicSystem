<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ErrorRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check($role)
    {
        $id = Auth::user()->getAuthIdentifier();
        if (!Auth::user()->hasRole($id, $role)) {
            return false;
        } else {
            return true;
        }
    }

    public function index(Request $request, $role)
    {
        $bool = $this->check($role);
        if ($bool) {
            return redirect()->route('control');
        } else {
            $id = Auth::user()->getAuthIdentifier();
            $yourRole = Auth::user()->getRole($id);
            return view('role')->with(['role' => $role, 'yourRole' => $yourRole]);
        }
    }
}
