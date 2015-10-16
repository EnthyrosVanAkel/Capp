<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    //
    protected $fillable = ['modelo','acceso'];
    protected $hidden = ['id','created_at','updated_at'];

//Catalogos tiene ESCOGER,OPCIONAL,TAXES Y ARQUITECTOS
    public function predeterminado()
    {
        return $this->hasMany('App\Predeterminado');
    }

    public function escoger()
    {
        return $this->hasMany('App\Escoger');
    }

    public function opcional()
    {
        return $this->hasMany('App\Opcional');
    }

    public function arquitecto()
    {
        return $this->hasMany('App\Arquitecto');
    }

    public function tax()
    {
        return $this->hasMany('App\Tax');
    }
    

}
