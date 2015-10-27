<?php

use Illuminate\Database\Seeder;

class OpcionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 //
        //factory(App\Opcional::class,3)->create();
        factory(App\OpcionalOptions::class,1)->create();
    }
}
