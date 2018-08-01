<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Doctor_type;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        $doctorType = Doctor_type::find(1)->id;
        foreach ($user as $users) {
            DB::table('doctors')->insert([
                'doctor_types_id' => $doctorType,
                'patent' => str_random(10),
                'experience' => rand(),
                'work_time' => str_random(20),
                'users_id' => $users->id,
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
