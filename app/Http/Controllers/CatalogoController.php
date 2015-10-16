<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCatalogoRequest;
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
        return view('Catalogo/index',compact('catalogos')); 
    }
 
    public function show($id)
    {
        //return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
        $catalogo = Catalogo::find($id);
        return view('Catalogo/show',compact('catalogo'));
    }



    public function create(){
      return view('Catalogo/create');
    }

    public function store(CreateCatalogoRequest $request)
    {
      Catalogo::create($request->all());
      return redirect('admin/catalogo');
    }
}
