<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquitecto extends Model
{
    //
    protected $table = 'arquitectos';
    protected $hidden = ['id','catalogo_id','created_at','updated_at'];
}
