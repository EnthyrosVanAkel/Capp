<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predeterminado extends Model
{
    //
    protected $table = 'predeterminados';
    protected $fillable = ['catalogo_id','nombre','descripcion','precio','url_img','proveedor'];
    protected $hidden = ['catalogo_id','created_at','updated_at'];
}
