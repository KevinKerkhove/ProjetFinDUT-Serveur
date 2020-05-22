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
        $this->call(UsersTableSeeder::class);
        /*$this->call(GroupesTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(CreneauxTableSeeder::class);
        $this->call(AbsencesTableSeeder::class);*/
    }
}
