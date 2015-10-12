<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Opcional;

class OpcionalController extends Controller
{
    //
        public function index()
    {
        return Opcional::with('opcionaloptions')->get();
    }
 
    public function show($id)
    {
        return Opcional::with('opcionaloptions')->findOrFail($id);
    }
}
