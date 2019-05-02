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
        $minutes_to_add = 30;
        $time = new DateTime('2019-05-05 10:00');

        foreach ($patient as $patients) {
            $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
            $stamp = $time->format('Y-m-d H:i:s');
            DB::table('coupons')->insert([
                'doctors_id' => $doctor,
                'patients_id' => $patients->id,
                'date' => $stamp,
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
