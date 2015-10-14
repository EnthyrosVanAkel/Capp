<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquitecto extends Model
{
    //
    protected $table = 'arquitectos';
    protected $hidden = ['id','created_at','updated_at'];
}
