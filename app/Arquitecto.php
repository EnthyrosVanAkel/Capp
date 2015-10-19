<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquitecto extends Model
{
    //
    protected $table = 'arquitectos';
    protected $fillable = ['nombre','descripcion','url_img'];
    protected $hidden = ['catalogo_id','created_at','updated_at'];
}
