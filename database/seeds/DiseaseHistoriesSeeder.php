<?php

use Illuminate\Database\Seeder;

class DiseaseHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disease_histories')->insert([
            'disease_name' => str_random(10),
            'analyzes' => str_random(10),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
