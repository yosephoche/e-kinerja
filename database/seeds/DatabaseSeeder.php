<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HariSeeder::class);
        $this->call(StatusHariSeeder::class);
        $this->call(BulanSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(EselonSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(RoleSeeder::class);
//        $this->call(PegawaiSeeder::class);
    }
}