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
        $this->call(EnseignantsTableSeeder::class);
        $this->call(EtudiantsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(EncryptorsTableSeeder::class);
        $this->call(SallesTableSeeder::class);
        $this->call(GroupesTableSeeder::class);
        $this->call(SeancesTableSeeder::class);
    }
}
