<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Ban_list;

class CheckBanUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::user()->getAuthIdentifier();
        $ban_users = Ban_list::all();
        $bool = false;
        foreach ($ban_users as $item) {
            if ($id == $item->users_id) {
                $bool = true;
                break;
            }
        }
        if ($bool) {
            $first_name = Auth::user()->getColumn('first_name', $id);
            $last_name = Auth::user()->getColumn('last_name', $id);
            return redirect()->route('banUser', ['first_name' => $first_name, 'last_name' => $last_name]);
        } else {
            return $next($request);
        }
    }
}
