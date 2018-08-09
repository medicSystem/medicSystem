<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DirectoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directories')->insert([
            'disease_name' => str_random(10),
            'category' => str_random(10),
            'treatment' => str_random(60),
            'symptoms' => str_random(60),
            'picture' => str_random(10) . '.png',
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
