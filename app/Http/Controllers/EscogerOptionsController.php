<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EscogerOptions;

class EscogerOptionsController extends Controller
{
    //

    public function index()
	{
		return EscogerOptions::all();
	}
 
	public function show($id)
	{
		return EscogerOptions::find($id);
	}
}
