<?php

use Illuminate\Database\Seeder;
use App\User;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        foreach ($user as $users) {
            DB::table('patients')->insert([
                'users_id' => $users->id,
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ]);
        }
    }
}
