<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escoger extends Model
{
    //
    protected $hidden = ['catalogo_id','created_at','updated_at'];
    protected $fillable = ['seccion'];

    public function escogerOptions()
    {
        return $this->hasMany('App\EscogerOptions');
    }
}
