<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Doctor_type;

class DoctorsSeeder extends Seeder
{
    public function run()
    {
        $user = User::all()->where('role', 'doctor');
        foreach ($user as $users) {
            DB::table('doctors')->insert([
                'doctor_types_id' => rand(1, 5),
                'patent' => str_random(10),
                'experience' => rand(1, 5),
                'work_time' => '09:00-17:00',
                'users_id' => $users->id,
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
