<?php

namespace App\Http\Controllers\Database;

use App\Doctor_type;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validate_doctor;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Database\DoctorsController;
use App\Http\Controllers\Database\UsersController;
use Intervention\Image\Facades\Image as ImageInt;

class ValidateDoctorsController extends Controller
{
    /*    public function getValidateDoctor($id)
        {
            $validate = DB::select('SELECT `validate_doctors`.`id`,`validate_doctors`.`first_name`,`validate_doctors`.`last_name`,`validate_doctors`.`email`,`validate_doctors`.`type`,`validate_doctors`.`birthday`,`validate_doctors`.`phone_number`,`validate_doctors`.`avatar`,`validate_doctors`.`patent`,`validate_doctors`.`experience`,`validate_doctors`.`work_time`,`validate_doctors`.`send_date`,`validate_doctors`.`status`,`validate_doctors`.`doctor_types_id` FROM `validate_doctors` JOIN `users` ON `validate_doctors`.`email` = `users`.`email` WHERE `users`.`id`='.$id );
            return $validate;
        }*/

    public function listNew()
    {
        $validateList = Validate_doctor::where('status', 'new')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function listRefuted()
    {
        $validateList = Validate_doctor::where('status', 'refuted')->get();
        $encodeValidateList = json_encode($validateList);
        return $encodeValidateList;
    }

    public function confirmation($id)
    {
        $doctor = new DoctorsController();
        $doctor->addDoctor($id);
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            Validate_doctor::where('email', $user->email)->delete();
        }
    }

    public function confutation($id)
    {
        $ban = new UsersController();
        $ban->banUser($id);
        $users = User::where('id', $id)->get();
        foreach ($users as $user) {
            Validate_doctor::where('email', $user->email)->update(['status' => 'refuted']);
        }
    }

    public function viewValidatePage()
    {
        $doctor_type = new Doctor_type();
        $types = $doctor_type->getTypeNames();
        return view('validate_page')->with(['types' => $types]);
    }

    public function addValidate(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $userList = new User();
        $users = $userList->getUser($id);
        $dir = 'patents';
        $divName = 'patent';

        foreach ($users as $user){
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $email = $user->email;
            $password = $user->password;
            $type = $user->role;
            $birthday = $user->birthday;
            $phone_number = $user->phone_number;
            $avatar = $user->avatar;
        }
        $work_time = $request->start_time . '-' .$request->end_time;
        $send_date = date('Y-m-d');
        $status = 'new';

        //doctor_type id
        $type_name = $request->doctor_types;
        $doctor_type = Doctor_type::where('type_name', $type_name)->get();
        foreach ($doctor_type as $item){
            $doctor_types_id = $item->id;
        }

        $experience = $request->experience;

        //upload patent image
        $waterMark = public_path().'/upload/waterMark/watermark.png';
        $dirName = "{$_SERVER['DOCUMENT_ROOT']}/upload";
        if (file_exists($dirName) && is_dir($dirName)) {
            $dirName = $dirName . '/' . $dir;
            if (file_exists($dirName) && is_dir($dirName)) {
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000){
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight >1000){
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            } else {
                mkdir($dirName);
                $file = $request->file($divName);
                $path = $file->store('upload/' . $dir);
                $imgWidth = ImageInt::make($file)->width();
                $imgHeight = ImageInt::make($file)->height();
                $height = $imgHeight;
                $width = $imgWidth;
                if ($imgWidth > 1000){
                    $width = 1000;
                    $difference = $imgWidth - $width;
                    $height = $imgHeight - $difference;
                }
                if ($imgHeight >1000){
                    $height = 1000;
                    $difference = $imgHeight - $height;
                    $height = $imgWidth - $difference;
                }
                $img = ImageInt::make($file);
                $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            }
        } else {
            mkdir($dirName);
            $dirName = $dirName . '/' . $dir;
            mkdir($dirName);
            $file = $request->file($divName);
            $path = $file->store('upload/' . $dir);
            //resize big image
            $imgWidth = ImageInt::make($file)->width();
            $imgHeight = ImageInt::make($file)->height();
            $height = $imgHeight;
            $width = $imgWidth;
            if ($imgWidth > 1000){
                $width = 1000;
                $difference = $imgWidth - $width;
                $height = $imgHeight - $difference;
            }
            if ($imgHeight >1000){
                $height = 1000;
                $difference = $imgHeight - $height;
                $height = $imgWidth - $difference;
            }
            $img = ImageInt::make($file);
            $img->resize($width, $height)->insert($waterMark, 'bottom-right', 10, 10)->save($path);
            $img->resize($width, $height)->save($path);
        }
        $length = strlen($dir) + 2;
        $patent = substr($path, strpos($path, '/') + $length);

        //add into db
        $validate = new Validate_doctor();
        $validate->first_name = $first_name;
        $validate->last_name = $last_name;
        $validate->email = $email;
        $validate->password = $password;
        $validate->type = $type;
        $validate->birthday = $birthday;
        $validate->phone_number = $phone_number;
        $validate->avatar = $avatar;
        $validate->work_time = $work_time;
        $validate->send_date = $send_date;
        $validate->status = $status;
        $validate->doctor_types_id = $doctor_types_id;
        $validate->experience = $experience;
        $validate->patent = $patent;
        $validate->save();
        return redirect()->route('validating_doctor');
    }
}
