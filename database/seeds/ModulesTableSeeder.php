<?php

use Illuminate\Database\Seeder;
use \App\Model\Module;

class ModulesTableSeeder extends Seeder {

    public function run(){
//        factory(Module::class, 10)->create();

        $module = factory(Module::class)->create([
            'nom' => 'Anglais',
            'nbHeuresTotal' => 45,
        ]);
        $module->save();

        $module1 = factory(Module::class)->create([
            'nom' => 'Communication',
            'nbHeuresTotal' => 45,
        ]);
        $module1->save();

        $module2 = factory(Module::class)->create([
            'nom' => 'PWEB',
            'nbHeuresTotal' => 60,
        ]);
        $module2->save();

        $module3 = factory(Module::class)->create([
            'nom' => 'SE',
            'nbHeuresTotal' => 30,
        ]);
        $module3->save();

        $module4 = factory(Module::class)->create([
            'nom' => 'RX',
            'nbHeuresTotal' => 30,
        ]);
        $module4->save();

        $module5 = factory(Module::class)->create([
            'nom' => 'Droit',
            'nbHeuresTotal' => 30,
        ]);
        $module5->save();

        $module5 = factory(Module::class)->create([
            'nom' => 'CPA',
            'nbHeuresTotal' => 45,
        ]);
        $module5->save();
    }
}
