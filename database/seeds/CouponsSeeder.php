<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class CouponsSeeder extends Seeder
{
    public function run()
    {
        $patient = Patient::all();
        $doctor = Doctor::find(1)->id;
        $time = 30;
        foreach ($patient as $patients) {

            DB::table('coupons')->insert([
                'doctors_id' => $doctor,
                'patients_id' => $patients->id,
                'date' => '',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
