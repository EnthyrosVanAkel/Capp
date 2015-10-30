<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcessoSeguroRequest;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catalogo;


class ApiController extends Controller
{
    //
    public function acceso($id){
    	return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
  
    }
/*
    public function acessos(AcessoSeguroRequest $request){
    	$modelo = $request->input('modelo');
    	$acceso = $request->input('acceso');
    	$user = DB::table('catalogos')->where('acceso', $acceso)->first();
    	$id = $user->id;
        return $id;
    }
*/
    public function acessos(){
        return 'ya';
    }


    public function lista()    {
    	$catalogo=Catalogo::all()->lists('modelo');
    	foreach ($catalogo as $depto){
    		$lista[] = array("depto" => $depto);
    	}
	$listaJSON = Response::json($lista);		
	return $listaJSON;
    }	
}
