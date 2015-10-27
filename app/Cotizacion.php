<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    //
    protected $table = 'cotizacions';
    protected $fillable = ['modelo','departamento','email','url_cotizacion'];
    protected $hidden = ['id','created_at','updated_at'];
}
