<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predeterminado extends Model
{
    //
    protected $table = 'predeterminados';
    protected $hidden = ['id','catalogo_id','created_at','updated_at'];
}
