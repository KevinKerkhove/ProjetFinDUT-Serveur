<?php

use App\Model\Tache;
use Illuminate\Database\Seeder;

class TacheTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Tache::class, 20)->create();
    }
}
