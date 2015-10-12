<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tax;

class TaxController extends Controller
{
    public function index()
    {
        return Tax::all();
    }
 
    public function show($id)
    {
        return Tax::find($id);
    }
}
