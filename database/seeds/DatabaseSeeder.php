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
        $this->call(PersonneTableSeeder::class);
        $this->call(JeuTableSeeder::class);
        $this->call(JeuPersonneTableSeeder::class);
        $this->call(SuiviTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
    }
}
