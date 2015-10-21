<?php

namespace App\Http\Controllers;

use Input;
use App\Http\Requests\CreateArquitectoRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Arquitecto;

class ArquitectoController extends Controller
{
       public function index()
    {
    	$arquitectos = Arquitecto::all();
    	return view('Admin/arquitecto/index',compact('arquitectos'));   	
    }
 
    public function show($id)
    {
    	$arquitecto = Arquitecto::find($id);
    	return view('Admin/arquitecto/show',compact('arquitecto'));
    }


    public function create()
    {
    	return view('Admin/arquitecto/create');
    }

    public function store(CreateArquitectoRequest $request)
    {
        $arquitecto = new Arquitecto();
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));

        $arquitecto->nombre = $request->input('nombre');
        $arquitecto->descripcion = $request->input('descripcion');
        $arquitecto->url_img = $nombre; 
        $arquitecto->save();
        return redirect('admin/arquitecto');
   }


    public function edit($id)
    {
    	$arquitecto = Arquitecto::find($id);
    	return view('Admin/arquitecto/edit',compact('arquitecto'));
    }

    public function update($id, CreateArquitectoRequest $request)
    {
    	$arquitecto = Arquitecto::find($id);
    	$arquitecto->update($request->all());
    	return redirect('admin/arquitecto');
    }

    public function destroy($id){
    	$arquitecto = Arquitecto::find($id);
    	$arquitecto->delete();
    	return redirect('admin/arquitecto');
    }


}


