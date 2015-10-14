<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catalogo;


class ApiController extends Controller
{
    //
    public function acceso($id){
    	return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
  
    }
}
