<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Arquitecto;

class ArquitectoController extends Controller
{
       public function index()
    {
        return Arquitecto::all();
    }
 
    public function show($id)
    {
        return Arquitecto::find($id);
    }
}
