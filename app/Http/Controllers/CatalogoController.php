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
        $catalogo = $catalogos->load('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax');
        return $catalogo; 
    }
 
    public function show($id)
    {
        return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
    }
}
