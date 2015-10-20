<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    //
    protected $table = 'taxes';
    protected $fillable = ['concepto','monto'];
    protected $hidden = ['catalogo_id','created_at','updated_at'];
}
