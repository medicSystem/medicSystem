<?php

use Illuminate\Database\Seeder;
use App\Directory;
use App\Medical_card;
use App\Doctor;

class DiseaseHistoriesSeeder extends Seeder
{
    public function run()
    {
        $doctor = Doctor::all();
        $medicalCard = Medical_card::find(1)->id;
        $directory = Directory::find(1)->id;
        foreach ($doctor as $doctors) {
            DB::table('disease_histories')->insert([
                'medical_cards_id' => $medicalCard,
                'directories_id' => $directory,
                'doctors_id' => $doctors->id,
                'conclusion' => str_random(10),
                'analyzes' => str_random(10),
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
