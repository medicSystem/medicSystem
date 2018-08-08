<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $id = Auth::user()->getAuthIdentifier();
        if (!Auth::user()->hasRole($id, $role)) {
            /*$request->session()->put('wantOpen', $role);*/
            return redirect()->route('errorRole', ['role' => $role]);
        }
        return $next($request);
    }
}
