<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(BanListSeeder::class);
        $this->call(MedicalCardsSeeder::class);
        $this->call(DirectoriesTableSeeder::class);
        $this->call(DoctorTypesSeeder::class);
        $this->call(DoctorsSeeder::class);
        $this->call(CouponsSeeder::class);
        $this->call(MessagesSeeder::class);
        $this->call(DiseaseHistoriesSeeder::class);
        Model::reguard();
    }
}
