<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Validate_doctor extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'validate_doctors';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type', 'birthday', 'phone_number', 'avatar', 'patent', 'experience', 'work_time', 'send_date', 'status', 'doctor_types_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function doctorType()
    {
        return $this->belongsTo('App\Doctor_type');
    }

    public function hasValidateDoctor($id)
    {
        $validates = DB::select('SELECT `validate_doctors`.`id`,`validate_doctors`.`first_name`,`validate_doctors`.`last_name`,`validate_doctors`.`email`,`validate_doctors`.`type`,`validate_doctors`.`birthday`,`validate_doctors`.`phone_number`,`validate_doctors`.`avatar`,`validate_doctors`.`patent`,`validate_doctors`.`experience`,`validate_doctors`.`work_time`,`validate_doctors`.`send_date`,`validate_doctors`.`status`,`validate_doctors`.`doctor_types_id` FROM `validate_doctors` JOIN `users` ON `validate_doctors`.`email` = `users`.`email` WHERE `users`.`id`=' . $id);
        foreach ($validates as $validate) {
            $validateId = $validate->id;
            if ($validateId != null) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getValidateDoctor($id)
    {
        $validate = DB::select('SELECT `validate_doctors`.`id`,`validate_doctors`.`first_name`,`validate_doctors`.`last_name`,`validate_doctors`.`email`,`validate_doctors`.`type`,`validate_doctors`.`birthday`,`validate_doctors`.`phone_number`,`validate_doctors`.`avatar`,`validate_doctors`.`patent`,`validate_doctors`.`experience`,`validate_doctors`.`work_time`,`validate_doctors`.`send_date`,`validate_doctors`.`status`,`validate_doctors`.`doctor_types_id` FROM `validate_doctors` JOIN `users` ON `validate_doctors`.`email` = `users`.`email` WHERE `users`.`id`=' . $id);
        return $validate;
    }
}
