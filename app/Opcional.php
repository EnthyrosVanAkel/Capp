<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcional extends Model
{
    //
    protected $hidden = ['id','created_at','updated_at'];


    public function opcionalOptions()
    {
        return $this->hasMany('App\OpcionalOptions');
    }
}
