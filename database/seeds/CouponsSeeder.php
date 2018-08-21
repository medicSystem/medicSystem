<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = Patient::all();
        $doctor = Doctor::find(1)->id;
        foreach ($patient as $patients) {
            DB::table('coupons')->insert([
                'doctors_id'=> $doctor,
                'patients_id' => $patients->id,
                'date' => $this->rendDate(),
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
