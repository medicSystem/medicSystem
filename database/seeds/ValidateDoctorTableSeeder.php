<?php

use Illuminate\Database\Seeder;
use App\Doctor_type;

class ValidateDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctorType = Doctor_type::find(1)->id;
        DB::table('validate_doctors')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10) . '@mail.ru',
            'password' => bcrypt(str_random(10)),
            'type' => str_random(10),
            'birthday' => $this->rendDate(),
            'phone_number' => str_random(14),
            'avatar' => str_random(10),
            'patent' => str_random(10),
            'experience' => rand(),
            'work_time' => str_random(20),
            'send_date' => $this->rendDate(),
            'status' => str_random(10),
            'doctor_types_id' => $doctorType,
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
