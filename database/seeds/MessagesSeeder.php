<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'message' => str_random(100),
            'send_datetime' => $this->rendDateTime(),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
