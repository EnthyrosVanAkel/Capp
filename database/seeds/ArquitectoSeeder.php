<?php

use Illuminate\Database\Seeder;

class ArquitectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory(App\Arquitecto::class,5)->create();
    }
}
