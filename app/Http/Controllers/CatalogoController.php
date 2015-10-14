<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catalogo;

class CatalogoController extends Controller
{
    public function index()
    {
        //return Catalogo::with('predeterminado','escoger','escogeroptions','opcional','arquitecto','tax')->get();
        $catalogos = Catalogo::all();
        return $catalogos; 
    }
 
    public function show($id)
    {
        //return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
        return Catalogo::find($id);
    }
}
