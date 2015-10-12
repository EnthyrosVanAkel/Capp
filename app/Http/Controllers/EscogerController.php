<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Escoger;


class EscogerController extends Controller
{
    //
    public function index()
    {
        return Escoger::with('escogeroptions')->get();
    }
 
    public function show($id)
    {
        return Escoger::with('escogeroptions')->findOrFail($id);
    }
}
