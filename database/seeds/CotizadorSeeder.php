<?php

use Illuminate\Database\Seeder;

class CotizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Cotizacion::class,100)->create();
    }
}
