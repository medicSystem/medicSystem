<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/*use Intervention\Image\Facades\Image as ImageInt;
use UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;
use Illuminate\Support\Facades\Storage;*/

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:6|max:12|confirmed',
            'role' => 'required',
            'birthday' => 'required|date|before:tomorrow',
            'phone_number' => 'required',
            'avatar' => 'required',
            'agree' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data, string $photoName)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'birthday' => $data['birthday'],
            'phone_number' => $data['phone_number'],
            'avatar' => $photoName,
        ]);
    }

    protected function check(array $data)
    {
        $users = User::where('email', $data['email'])->get();
        $bool = false;
        foreach ($users as $user) {
            if ($user->id == null) {
                $bool = false;
            } else {
                $bool = true;
            }
        }
        return $bool;
    }

    protected function session(array $data)
    {
        session(['email' => $data['email']]);
        session(['role' => $data['role']]);
        session(['first_name' => $data['first_name']]);
    }
}
