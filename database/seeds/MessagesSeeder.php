<?php

use Illuminate\Database\Seeder;
use App\Messenger;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messenger = Messenger::all();
        foreach ($messenger as $messengers) {
            DB::table('messages')->insert([
                'messengers_id' => $messengers->id,
                'message' => str_random(100),
                'send_datetime' => $this->rendDateTime(),
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
