<?php

use Illuminate\Database\Seeder;

class PredeterminadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Predeterminado::class,4)->create();
    }
}
