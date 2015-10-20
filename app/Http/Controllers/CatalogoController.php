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
        return view('Admin/catalogo/index',compact('catalogos')); 
    }
 
    public function show($id)
    {
        $catalogo = Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
        //$catalogo = Catalogo::find($id);
        return view('Admin/catalogo/show',compact('catalogo'));
    }



    public function create(){
      return view('Admin/catalogo/create');
    }

    public function store(CreateCatalogoRequest $request)
    {
      Catalogo::create($request->all());
      return redirect('admin/catalogo');
    }


    public function edit($id){
      $catalogo = Catalogo::find($id);
      return view('Admin/catalogo/edit',compact('catalogo'));
    }


    public function update($id,CreateCatalogoRequest $request){
      $catalogo = Catalogo::find($id);
      $catalogo->update($request->all());
      return redirect('admin/catalogo');
    }

    public function destroy($id){
      $catalogo = Catalogo::find($id);
      $catalogo->delete();
      return redirect('admin/catalogo');
    }
}
