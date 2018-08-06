<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Intervention\Image\Facades\Image as ImageInt;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        try {
            $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
            if (file_exists($dirName) && is_dir($dirName)) {
                $dirName = $dirName . '/user';
                if (file_exists($dirName) && is_dir($dirName)){
                    $file = $request->file('avatar');
                    $path = $file->store('upload/user');
                    $img = ImageInt::make($file);
                    $img->resize(200, 200)->save($path);
                }
                else{
                    mkdir($dirName);
                    $file = $request->file('avatar');
                    $path = $file->store('upload/user');
                    $img = ImageInt::make($file);
                    $img->resize(200, 200)->save($path);
                }
            } else {
                mkdir($dirName);
                $dirName = $dirName . '/user';
                mkdir($dirName);
                $file = $request->file('avatar');
                $path = $file->store('upload/user');
                $img = ImageInt::make($file);
                $img->resize(200, 200)->save($path);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        $name = substr($path, strpos($path, '/') + 6);

        event(new Registered($user = $this->create($request->all(), $name)));

        $bool = $this->check($request->all());

        if (!$bool) {
            $delete = public_path() . "/" . $path;
            unlink($delete);
        }

        $this->guard()->login($user);

        $this->session($request->all());

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
