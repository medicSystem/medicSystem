<?php

use Illuminate\Database\Seeder;

class MedicalCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_cards')->insert([
            'postal_address' => str_random(10),
            'sex' => str_random(1),
            'chronic_disease' => str_random(50),
            'allergy' => str_random(10),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
