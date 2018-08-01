<?php

use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            'date' => $this->rendDateTime(),
            'status' => str_random(10),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
