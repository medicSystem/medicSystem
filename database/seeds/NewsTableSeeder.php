<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'photo' => str_random(10) . '.png',
            'news_name' => str_random(15),
            'content' => str_random(60),
            'created_at' => $this->rendDateTime(),
            'updated_at' => $this->rendDateTime(),
        ]);
    }
}
