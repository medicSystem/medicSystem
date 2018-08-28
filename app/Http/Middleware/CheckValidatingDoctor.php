<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Ban_list;
use App\Validate_doctor;
use App\Doctor;

class CheckValidatingDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($id);
        if ($role == 'doctor') {
            $validate = new Validate_doctor();
            $hasValidate = $validate->hasValidateDoctor($id);
            if ($hasValidate) {
                $validateStatus = $validate->getValidateDoctor($id);
                foreach ($validateStatus as $status) {
                    $checkStatus = $status->status;
                    if ($checkStatus == 'new') {
                        return redirect()->route('validating_doctor');
                    } elseif ($checkStatus == 'refuted') {
                        $ban = new Ban_list();
                        $hasBan = $ban->hasBan($id);
                        if (!$hasBan) {
                            $ban->addBan($id);
                            $first_name = $status->first_name;
                            $last_name = $status->last_name;
                            return redirect()->route('banUser', ['first_name' => $first_name, 'last_name' => $last_name]);
                        } else {
                            $first_name = $status->first_name;
                            $last_name = $status->last_name;
                            return redirect()->route('banUser', ['first_name' => $first_name, 'last_name' => $last_name]);
                        }
                    }
                }
            } else {
                $doctor = new Doctor();
                $hasDoctor = $doctor->hasDoctor($id);
                if ($hasDoctor) {
                    return $next($request);
                } else {
                    return redirect()->route('viewValidatePage');
                }
            }
        }
    }
}
