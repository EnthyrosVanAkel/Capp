<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escoger extends Model
{
    //
    protected $hidden = ['id','catalogo_id','created_at','updated_at'];


    public function escogerOptions()
    {
        return $this->hasMany('App\EscogerOptions');
    }
}
