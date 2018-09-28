<?php

use Illuminate\Database\Seeder;

class DoctorTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('doctor_types')->insert([
            [
                'type_name' => 'Allergists',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'type_name' => 'Cardiologists',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'type_name' => 'Dermatologists',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'type_name' => 'Endocrinologists',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'type_name' => 'Gastroenterologists',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
        ]);
    }
}
