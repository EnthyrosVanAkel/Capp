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

	public function update($id_catalogo,UpdateEscogerRequest $request){
        $escoger = new Escoger();
        $escogeroptions1 = new EscogerOptions();
        $escogeroptions2 = new EscogerOptions();
        $escogeroptions3 = new EscogerOptions();

        $file1 = $request->file('imagen1');
        $nombre1 = $file1->getClientOriginalName();
        \Storage::disk('local')->put($nombre1, \File::get($file1));
        $file2 = $request->file('imagen2');
        $nombre2 = $file2->getClientOriginalName();
        \Storage::disk('local')->put($nombre2, \File::get($file2));
        $file3 = $request->file('imagen3');
        $nombre3 = $file3->getClientOriginalName();
        \Storage::disk('local')->put($nombre3, \File::get($file3));

        $escoger->catalogo_id = $id_catalogo;
        $escoger->seccion = $request->input('seccion');
        $escoger->save();   

        $escogeroptions1->escoger_id = $escoger->id;
        $escogeroptions1->nombre = $request->input('nombre1');
        $escogeroptions1->descripcion = $request->input('descripcion1');
        $escogeroptions1->precio = $request->input('precio1');
        $escogeroptions1->url_img = $nombre1; 
        $escogeroptions1->proveedor = $request->input('proveedor1');
        $escogeroptions1->save();

        $escogeroptions2->escoger_id = $escoger->id;
        $escogeroptions2->nombre = $request->input('nombre2');
        $escogeroptions2->descripcion = $request->input('descripcion2');
        $escogeroptions2->precio = $request->input('precio2');
        $escogeroptions2->url_img = $nombre2; 
        $escogeroptions2->proveedor = $request->input('proveedor2');
        $escogeroptions2->save();

        $escogeroptions3->escoger_id = $escoger->id;
        $escogeroptions3->nombre = $request->input('nombre3');
        $escogeroptions3->descripcion = $request->input('descripcion3');
        $escogeroptions3->precio = $request->input('precio3');
        $escogeroptions3->url_img = $nombre3; 
        $escogeroptions3->proveedor = $request->input('proveedor3');
        $escogeroptions3->save();

        return redirect('admin/catalogo/'.$id_catalogo);
    }  
}
