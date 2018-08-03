<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10) . '@mail.ru',
            'password' => bcrypt(str_random(10)),
            'type' => str_random(10),
            'birthday' => $this->rendDate(),
            'phone_number' => str_random(10),
            'avatar' => str_random(10),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}