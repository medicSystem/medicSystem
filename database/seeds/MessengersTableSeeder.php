<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class MessengersTableSeeder extends Seeder
{
    public function run()
    {
        /*$patient = Patient::all();
        $doctor = Doctor::find(1)->id;
        foreach ($patient as $patients) {
            DB::table('messengers')->insert([
                'doctors_id' => $doctor,
                'patients_id' => $patients->id,
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }*/
    }
}
