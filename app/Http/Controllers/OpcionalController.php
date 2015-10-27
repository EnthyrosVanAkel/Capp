<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpcionalRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Opcional;
use App\OpcionalOptions;

class OpcionalController extends Controller
{
    //
        public function index()
    {
        //return Opcional::with('opcionaloptions')->get();
        return Opcional::all();
    }
 
    public function show($catalogo,$id)
    {
        //return Opcional::with('opcionaloptions')->findOrFail($id);
        $opcional = Opcional::find($id);
        return view('Admin/Opcional/show',compact('opcional'));
    }

    public function create($id_catalogo){
        return view('Admin/Opcional/create',compact('id_catalogo'));
    }

    public function store($id_catalogo,CreateOpcionalRequest $request){
        $opcional = new Opcional();
        $opcionaloptions = new OpcionalOptions();
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));

        $opcional->catalogo_id = $id_catalogo;
        $opcional->seccion = $request->input('seccion');
        $opcional->save();

        $opcionaloptions->opcional_id = $opcional->id;
        $opcionaloptions->nombre = $request->input('nombre');
        $opcionaloptions->descripcion = $request->input('descripcion');
        $opcionaloptions->precio = $request->input('precio');
        $opcionaloptions->url_img = $nombre; 
        $opcionaloptions->proveedor = $request->input('proveedor');
        $opcionaloptions->save();
        return redirect('admin/catalogo/'.$id_catalogo);
    }  

    public function edit($id_catalogo,$id){
        $opcional = Opcional::find($id);
        return view('Admin/Opcional/edit',compact('id_catalogo','opcional'));
    }

     public function destroy($catalogo_id,$id){
        $opcional = Opcional::find($id);
        foreach ($opcional->opcionaloptions as $opcion) {
            $opcion->delete();
        }
        $opcional->delete();
        return redirect('admin/catalogo/'.$catalogo_id);
    }

}
