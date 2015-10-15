<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionalOptions extends Model
{
    //
    protected $table = 'opcional_options';
    protected $hidden = ['catalogo_id','created_at','updated_at'];
}
