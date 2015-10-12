<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OpcionalOptions;

class OpcionalOptionsController extends Controller
{
    //
    public function index()
	{
		return OpcionalOptions::all();
	}
 
	public function show($id)
	{
		return OpcionalOptions::find($id);
	}
}
