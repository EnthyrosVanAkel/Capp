<?php

use Illuminate\Database\Seeder;

class EscogerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\Escoger::class,3)->create();
        factory(App\EscogerOptions::class,3)->create();
    }
}
