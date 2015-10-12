<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscogerOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escoger_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('escoger_id')->unsigned();
            $table->string('nombre',30);
            $table->text('descripcion');
            $table->float('precio');
            $table->string('url_img',50);
            $table->string('proveedor',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('escoger_options');
    }
}
