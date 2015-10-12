<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Predeterminado;

class PredeterminadoController extends Controller
{
    //
    public function index()
	{
		return Predeterminado::all();
	}
 
	public function show($id)
	{
		return Predeterminado::find($id);
	}
}
