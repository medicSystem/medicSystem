<?php

namespace App\Http\Controllers\Database;

use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messenger;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function createNewMessengerAndReturn($id)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $role = Auth::user()->getRole($user_id);
        if ($role == 'doctor') {
            $doctors = Doctor::where('users_id', $user_id)->get();
            foreach ($doctors as $doctor) {
                $doctor_id = $doctor->id;
            }
            $patient_id = $id;
        } elseif ($role == 'patient') {
            $patients = Patient::where('users_id', $user_id)->get();
            foreach ($patients as $patient) {
                $patient_id = $patient->id;
            }
            $doctor_id = $id;
        }
        $messenger = Messenger::where(['doctors_id' => $doctor_id, 'patients_id' => $patient_id])->get();
        if ($messenger->isNotEmpty()) {
            $encode = json_encode($messenger);
        } else {
            $model = Messenger::firstOrNew(['doctors_id' => $doctor_id, 'patients_id' => $patient_id]);
            $model->save();
            $encode = json_encode($model);
        }
        return $encode;
    }

    public function getMessageList($id)
    {
        $messageList = Message::where('messengers_id', $id)->get();
        $encode = json_encode($messageList);
        return $encode;
    }

    public function getMessageListForCurrentUser($id, $role){
        if ($role == 'doctor'){
            $doctors = Doctor::where('id', $id)->get();
            foreach ($doctors as $doctor){
                $user_id = $doctor->users_id;
            }
            $messageList = Message::where('users_id', $user_id)->get();
            $encode = json_encode($messageList);
        } elseif ($role == 'patient'){
            $patients = Patient::where('id', $id)->get();
            foreach ($patients as $patient){
                $user_id = $patient->users_id;
            }
            $messageList = Message::where('users_id', $user_id)->get();
            $encode = json_encode($messageList);
        }else {
            $encode = 'Error. Check your parametries';
        }
        return $encode;
    }

    public function addMessage(Request $request, $id)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $message = new Message();
        $message->message = $request->message;
        $message->users_id = $user_id;
        $message->messengers_id = $id;
        $message->send_datetime = date('Y-m-d H:m:s');
        $message->save();
    }
}
